<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'description'   => 'PRODUCTO 01 PROVEEDOR 01',
            'stock'         => 100,
            'project_id'    => 1,
            'warehouse_id'  => 1,
            'supplier_id'   => 1,
        ]);
        Product::create([
            'description'   => 'PRODUCTO 02 PROVEEDOR 01',
            'stock'         => 1000,
            'project_id'    => 1,
            'warehouse_id'  => 1,
            'supplier_id'   => 1,
        ]);
        Product::create([
            'description'   => 'PRODUCTO 03 PROVEEDOR 01',
            'stock'         => 10000,
            'project_id'    => 1,
            'warehouse_id'  => 1,
            'supplier_id'   => 1,
        ]);

        Product::create([
            'description'   => 'PRODUCTO 02 - PROVEEDOR 02',
            'stock'         => 200,
            'project_id'    => 2,
            'warehouse_id'  => 2,
            'supplier_id'   => 2,
        ]);

        Product::create([
            'description'   => 'PRODUCTO 03 - PROVEEDOR 03',
            'stock'         => 300,
            'project_id'    => 3,
            'warehouse_id'  => 3,
            'supplier_id'   => 3,
        ]);

        Product::create([
            'description'   => 'PRODUCTO 04 - PROVEEDOR 04',
            'stock'         => 400,
            'project_id'    => 4,
            'warehouse_id'  => 4,
            'supplier_id'   => 4,
        ]);
    }
}
