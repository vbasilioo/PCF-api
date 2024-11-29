<?php

namespace App\Services\News;

use App\Models\News;

class NewsService{
    public function store(array $data): array{
        return News::create($data)->toArray();
    }

    public function index(array $data): array{
        return News::paginate($data['per_page'], ['*'], 'page', $data['page'])->toArray();
    }

    public function show(array $data): array{
        return News::find($data['id'])->toArray();
    }

    public function update(array $data): array{
        News::where('id', $data['id'])->update($data);
        return News::find($data['id'])->toArray();
    }

    public function destroy(array $data): array {
        News::find($data['id'])->delete();
        return News::onlyTrashed()->find(['id' => $data['id']])->first()->toArray();
    }

    public function restore(array $data): array{
        News::withTrashed()->where('id', $data['id'])->restore();
        return News::find($data['id'])->toArray();
    }
}