<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Warehouse;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Warehouse::create([
            'description'   => 'ALMACEN 01',
        ]);
        Warehouse::create([
            'description'   => 'ALMACEN 02',
        ]);
        Warehouse::create([
            'description'   => 'ALMACEN 03',
        ]);
        Warehouse::create([
            'description'   => 'ALMACEN 04',
        ]);
    }
}
