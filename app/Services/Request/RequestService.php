<?php

namespace App\Services\Request;

use App\Models\Request;

class RequestService{
    public function store(array $data): array{
        return Request::create($data)->toArray();
    }

    public function index(array $data): array{
        return Request::paginate($data['per_page'], ['*'], 'page', $data['page'])->toArray();
    }

    public function show(array $data): array{
        return Request::find($data['id'])->toArray();
    }

    public function update(array $data): array{
        Request::where('id', $data['id'])->update($data);
        return Request::find($data['id'])->toArray();
    }

    public function destroy(array $data): array {
        Request::find($data['id'])->delete();
        return Request::onlyTrashed()->find(['id' => $data['id']])->first()->toArray();
    }

    public function restore(array $data): array{
        Request::withTrashed()->where('id', $data['id'])->restore();
        return Request::find($data['id'])->toArray();
    }
}