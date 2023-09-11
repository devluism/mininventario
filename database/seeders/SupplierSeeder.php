<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Supplier::create([
            'name'=> 'PROVEEDOR 01',
            'code'=> 'PROV001',
        ]);
        Supplier::create([
            'name'=> 'PROVEEDOR 02',
            'code'=> 'PROV002',
        ]);
        Supplier::create([
            'name'=> 'PROVEEDOR 03',
            'code'=> 'PROV003',
        ]);
        Supplier::create([
            'name'=> 'PROVEEDOR 04',
            'code'=> 'PROV004',
        ]);
    }
}
