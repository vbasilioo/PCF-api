<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Address;
use App\Models\User;

class AddressSeeder extends Seeder
{
    public function run()
    {
        Address::create([
            'street' => 'Rua Exemplo, 123',
            'city' => 'Cidade Exemplo',
            'state' => 'SP',
            'zipcode' => '12345-678',
            'country' => 'Brasil',
            'user_id' => User::first()->id,
        ]);
    }
}
