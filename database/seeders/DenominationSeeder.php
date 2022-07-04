<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Denomination;

class DenominationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Denomination::create([
            'type'  => 'BILLETE',
            'value' => 1000
        ]);
        Denomination::create([
            'type'  => 'BILLETE',
            'value' => 500
        ]);
        Denomination::create([
            'type'  => 'BILLETE',
            'value' => 200
        ]);
        Denomination::create([
            'type'  => 'BILLETE',
            'value' => 100
        ]);
        Denomination::create([
            'type'  => 'BILLETE',
            'value' => 50
        ]);
        Denomination::create([
            'type'  => 'MONEDA',
            'value' => 10
        ]);
        Denomination::create([
            'type'  => 'BILLETE',
            'value' => 20
        ]);
        Denomination::create([
            'type'  => 'MONEDA',
            'value' => 5
        ]);
        Denomination::create([
            'type'  => 'MONEDA',
            'value' => 1
        ]);
        Denomination::create([
            'type'  => 'MONEDA',
            'value' => 0.5
        ]);
        Denomination::create([
            'type'  => 'OTRO',
            'value' => 0
        ]);
    }
}
