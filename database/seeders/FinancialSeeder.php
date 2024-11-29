<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Financial;
use App\Models\User;

class FinancialSeeder extends Seeder
{
    public function run()
    {
        Financial::create([
            'description' => 'Pagamento de serviços',
            'amount' => 1000.00,
            'type' => 'DESPESAS',
            'user_id' => User::first()->id,
        ]);
    }
}
