<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Vinícius Basílio',
            'email' => 'vinicius.basilio@projetocriancafeliz.org',
            'password' => bcrypt('12345678'),
            'date_of_birth' => '2002-03-13',
            'profile_image' => 'path/to/image.jpg',
            'department_id' => Department::first()->id,
        ]);
    }
}
