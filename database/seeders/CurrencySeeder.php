<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrencySeeder extends Seeder
{
    public function run()
    {
        $currencies = [
            ['name' => 'Bitcoin', 'symbol' => 'BTC'],
            ['name' => 'Ethereum', 'symbol' => 'ETH'],
            ['name' => 'Palestine Coin', 'symbol' => 'PalCoin'],
        ];

        foreach ($currencies as $data) {
            Currency::firstOrCreate(['symbol' => $data['symbol']], $data);
        }
    }
}

