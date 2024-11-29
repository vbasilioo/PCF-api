<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Carlos Souza',
            'email' => 'carlos.souza@example.com',
            'password' => bcrypt('password'),
            'date_of_birth' => '1985-05-20',
            'profile_image' => 'path/to/image.jpg',
        ]);
    }
}
