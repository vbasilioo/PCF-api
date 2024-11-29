<?php

namespace App\Services\Address;

use App\Models\Address;

class AddressService{
    public function store(array $data): array{
        return Address::create($data)->toArray();
    }

    public function index(array $data): array{
        return Address::paginate($data['per_page'], ['*'], 'page', $data['page'])->toArray();
    }

    public function show(array $data): array{
        return Address::find($data['id'])->toArray();
    }

    public function update(array $data): array{
        Address::where('id', $data['id'])->update($data);
        return Address::find($data['id'])->toArray();
    }

    public function destroy(array $data): array {
        Address::find($data['id'])->delete();
        return Address::onlyTrashed()->find(['id' => $data['id']])->first()->toArray();
    }

    public function restore(array $data): array{
        Address::withTrashed()->where('id', $data['id'])->restore();
        return Address::find($data['id'])->toArray();
    }
}