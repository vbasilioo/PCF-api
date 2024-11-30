<?php

namespace App\Services\User;

use App\Exceptions\ApiException;
use App\Models\Department;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

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

    public function totalUsers(){
        return User::whereNull('deleted_at')->count();
    }

    public function totalUsersDepartment(){
        return Department::withCount(['user' => function ($query) {
            $query->whereNull('deleted_at');
        }])->get()->map(function ($department) {
            return [
                'department_id' => $department->id,
                'department_name' => $department->name,
                'active_users_count' => $department->user_count,
            ];
        });
    }
}