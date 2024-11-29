<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Request;
use App\Models\User;
use App\Models\Department;

class RequestSeeder extends Seeder
{
    public function run()
    {
        Request::create([
            'title' => 'Solicitação de novo equipamento',
            'description' => 'Solicitação para aquisição de novos equipamentos de informática',
            'status' => 'PENDENTE',
            'user_id' => User::first()->id,
            'department_id' => Department::first()->id,
        ]);
    }
}
