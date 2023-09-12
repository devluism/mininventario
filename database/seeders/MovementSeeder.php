<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Movement;

class MovementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Movement::create([
            'product_id'    => 1,
            'delivery_name' => 'ENTREGA 01',
            'delivery_id'   => 123456789,
            'receiver_name' => 'RECIBE 01',
            'receiver_id'   => 987654321,
            'amount'        => 100,
            'type'          => 'incoming',
        ]);
        Movement::create([
            'product_id'    => 2,
            'delivery_name' => 'ENTREGA 02',
            'delivery_id'   => 123456789,
            'receiver_name' => 'RECIBE 02',
            'receiver_id'   => 987654321,
            'amount'        => 200,
            'type'          => 'outgoing',
        ]);
        Movement::create([
            'product_id'    => 3,
            'delivery_name' => 'ENTREGA 03',
            'delivery_id'   => 123456789,
            'receiver_name' => 'RECIBE 03',
            'receiver_id'   => 987654321,
            'amount'        => 300,
            'type'          => 'incoming',
        ]);
        Movement::create([
            'product_id'    => 4,
            'delivery_name' => 'ENTREGA 04',
            'delivery_id'   => 123456789,
            'receiver_name' => 'RECIBE 04',
            'receiver_id'   => 987654321,
            'amount'        => 400,
            'type'          => 'outgoing',
        ]);
    }
}
