<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username'=> 'admin',
            'email'=> 'admin@minerven.com',
            'role' => 0,
            'password' => Hash::make('1234'),
            'email_verified_at' => now(),
        ]);
        User::create([
            'username'=> 'jefe1',
            'email'=> 'jefe1@minerven.com',
            'role' => 1,
            'password' => Hash::make('1234'),
            'email_verified_at' => now(),
        ]);
        User::create([
            'username'=> 'jefe2',
            'email'=> 'jefe2@minerven.com',
            'role' => 1,
            'password' => Hash::make('1234'),
            'email_verified_at' => now(),
        ]);
        User::create([
            'username'=> 'inventario',
            'email'=> 'inventario@minerven.com',
            'role' => 2,
            'password' => Hash::make('1234'),
            'email_verified_at' => now(),
        ]);
    }
}
