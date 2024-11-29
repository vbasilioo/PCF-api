<?php

namespace App\Services\Department;

use App\Models\Department;

class DepartmentService{
    public function store(array $data): array{
        return Department::create($data)->toArray();
    }

    public function index(array $data): array{
        return Department::paginate($data['per_page'], ['*'], 'page', $data['page'])->toArray();
    }

    public function show(array $data): array{
        return Department::find($data['id'])->toArray();
    }

    public function update(array $data): array{
        Department::where('id', $data['id'])->update($data);
        return Department::find($data['id'])->toArray();
    }

    public function destroy(array $data): array {
        Department::find($data['id'])->delete();
        return Department::onlyTrashed()->find(['id' => $data['id']])->first()->toArray();
    }

    public function restore(array $data): array{
        Department::withTrashed()->where('id', $data['id'])->restore();
        return Department::find($data['id'])->toArray();
    }
}