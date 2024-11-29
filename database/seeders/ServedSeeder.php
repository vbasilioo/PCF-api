<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Served;
use App\Models\Department;
use App\Models\Address;

class ServedSeeder extends Seeder
{
    public function run()
    {
        Served::create([
            'name' => 'João Silva',
            'date_of_birth' => '1990-01-01',
            'department_id' => Department::first()->id,
            'address_id' => Address::first()->id,
        ]);
    }
}
