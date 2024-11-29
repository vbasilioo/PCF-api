<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService{
    public function store(array $data){
        $data['password'] = Hash::make($data['password']);
        return User::create($data)->toArray();
    }

    public function index(array $data){
        return User::paginate($data['per_page'], ['*'], 'page', $data['page'])->toArray();
    }

    public function show(array $data){
        return User::find($data['id'])->toArray();
    }

    public function update(array $data){
        $data['password'] = Hash::make($data['password']);
        User::where('id', $data['id'])->update($data);
        return User::find($data['id']);
    }

    public function destroy(array $data){
        User::find($data['id'])->delete();
        return User::onlyTrashed()->find(['id' => $data['id']])->first();
    }

    public function restore(array $data){
        User::withTrashed()->find($data['id'])->restore();
        return User::find($data['id']);
    }
}