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
            'first_name'=> 'Inventario',
            'last_name'=> 'Administrador',
            'email'=> 'admin@minerven.com',
            'role' => 0,
            'password' => Hash::make('1234'),
            'email_verified_at' => now(),
        ]);
        User::create([
            'username'=> 'llinares',
            'first_name'=> 'Luis',
            'last_name'=> 'Linares',
            'email'=> 'llinares@minerven.com',
            'role' => 1,
            'password' => Hash::make('1234'),
            'email_verified_at' => now(),
        ]);
        User::create([
            'username'=> 'rlezama',
            'first_name'=> 'Rina',
            'last_name'=> 'Lezama',
            'email'=> 'rlezama@minerven.com',
            'role' => 1,
            'password' => Hash::make('1234'),
            'email_verified_at' => now(),
        ]);
        User::create([
            'username'=> 'afarias',
            'first_name'=> 'Anyelines',
            'last_name'=> 'Farias',
            'email'=> 'afarias@minerven.com',
            'role' => 1,
            'password' => Hash::make('1234'),
            'email_verified_at' => now(),
        ]);
        User::create([
            'username'=> 'gdbenedetto',
            'first_name'=> 'Giannina',
            'last_name'=> 'de Benedetto',
            'email'=> 'gdbenedetto@minerven.com',
            'role' => 1,
            'password' => Hash::make('1234'),
            'email_verified_at' => now(),
        ]);
        User::create([
            'username'=> 'egoudet',
            'first_name'=> 'Elsy',
            'last_name'=> 'Goudet',
            'email'=> 'egoudet@minerven.com',
            'role' => 1,
            'password' => Hash::make('1234'),
            'email_verified_at' => now(),
        ]);
        User::create([
            'username'=> 'bsanchez',
            'first_name'=> 'Becker',
            'last_name'=> 'Sanchez',
            'email'=> 'bsanchez@minerven.com',
            'role' => 1,
            'password' => Hash::make('1234'),
            'email_verified_at' => now(),
        ]);
        User::create([
            'username'=> 'rbracho',
            'first_name'=> 'Ronald',
            'last_name'=> 'Bracho',
            'email'=> 'rbracho@minerven.com',
            'role' => 1,
            'password' => Hash::make('1234'),
            'email_verified_at' => now(),
        ]);
        User::create([
            'username'=> 'jramirez',
            'first_name'=> 'Jorge',
            'last_name'=> 'Ramirez',
            'email'=> 'jramirez@minerven.com',
            'role' => 1,
            'password' => Hash::make('1234'),
            'email_verified_at' => now(),
        ]);
        User::create([
            'username'=> 'eescobar',
            'first_name'=> 'Esperanza',
            'last_name'=> 'Escobar',
            'email'=> 'eescobar@minerven.com',
            'role' => 1,
            'password' => Hash::make('1234'),
            'email_verified_at' => now(),
        ]);
        User::create([
            'username'=> 'asalinas',
            'first_name'=> 'Ana',
            'last_name'=> 'Salinas',
            'email'=> 'asalinas@minerven.com',
            'role' => 1,
            'password' => Hash::make('1234'),
            'email_verified_at' => now(),
        ]);
        User::create([
            'username'=> 'fpino',
            'first_name'=> 'Franklin',
            'last_name'=> 'Pino',
            'email'=> 'fpino@minerven.com',
            'role' => 1,
            'password' => Hash::make('1234'),
            'email_verified_at' => now(),
        ]);
        User::create([
            'username'=> 'bleon',
            'first_name'=> 'Betelgueuse',
            'last_name'=> 'Leon',
            'email'=> 'bleon@minerven.com',
            'role' => 1,
            'password' => Hash::make('1234'),
            'email_verified_at' => now(),
        ]);
    }
}
