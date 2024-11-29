<?php

namespace App\Services\Financial;

use App\Models\Financial;

class FinancialService{
    public function store(array $data): array{
        return Financial::create($data)->toArray();
    }

    public function index(array $data): array{
        return Financial::paginate($data['per_page'], ['*'], 'page', $data['page'])->toArray();
    }

    public function show(array $data): array{
        return Financial::find($data['id'])->toArray();
    }

    public function update(array $data): array{
        Financial::where('id', $data['id'])->update($data);
        return Financial::find($data['id'])->toArray();
    }

    public function destroy(array $data): array {
        Financial::find($data['id'])->delete();
        return Financial::onlyTrashed()->find(['id' => $data['id']])->first()->toArray();
    }

    public function restore(array $data): array{
        Financial::withTrashed()->where('id', $data['id'])->restore();
        return Financial::find($data['id'])->toArray();
    }
}