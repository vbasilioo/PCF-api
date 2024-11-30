<?php

namespace App\Services\Served;

use App\Models\Department;
use App\Models\Served;

class ServedService{
    public function store(array $data): array{
        return Served::create($data)->toArray();
    }

    public function index(array $data): array{
        return Served::paginate($data['per_page'], ['*'], 'page', $data['page'])->toArray();
    }

    public function show(array $data): array{
        return Served::find($data['id'])->toArray();
    }

    public function update(array $data): array{
        Served::where('id', $data['id'])->update($data);
        return Served::find($data['id'])->toArray();
    }

    public function destroy(array $data): array {
        Served::find($data['id'])->delete();
        return Served::onlyTrashed()->find(['id' => $data['id']])->first()->toArray();
    }

    public function restore(array $data): array{
        Served::withTrashed()->where('id', $data['id'])->restore();
        return Served::find($data['id'])->toArray();
    }

    public function totalServeds(){
        return Served::whereNotNull('deleted_at')->count();
    }

    public function totalServedsDepartments(){
        return Department::withCount(['served' => function ($query) {
            $query->whereNull('deleted_at');
        }])->get()->map(function ($department) {
            return [
                'department_id' => $department->id,
                'department_name' => $department->name,
                'active_serveds_count' => $department->user_count,
            ];
        });
    }
}