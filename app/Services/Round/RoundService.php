<?php

namespace App\Services\Round;

use App\Models\Round;

class RoundService {
    public function store(array $data): array{
        return Round::create($data)->toArray();
    }

    public function index(array $data): array{
        return Round::paginate($data['per_page'], ['*'], 'page', $data['page'])->toArray();
    }

    public function show(array $data): array{
        return Round::find($data['id'])->toArray();
    }

    public function update(array $data): array{
        Round::where('id', $data['id'])->update($data);
        return Round::find($data['id'])->toArray();
    }

    public function destroy(array $data): array {
        Round::find($data['id'])->delete();
        return Round::onlyTrashed()->find(['id' => $data['id']])->first()->toArray();
    }

    public function restore(array $data): array{
        Round::withTrashed()->where('id', $data['id'])->restore();
        return Round::find($data['id'])->toArray();
    }
}