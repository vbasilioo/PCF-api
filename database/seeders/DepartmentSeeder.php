<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;
use App\Models\User;

class DepartmentSeeder extends Seeder
{
    public function run()
    {
        Department::create([
            'name' => 'Departamento de TI',
            'description' => 'Departamento responsável por toda infraestrutura de TI',
            'leader_id' => User::first()->id,
        ]);
    }
}
