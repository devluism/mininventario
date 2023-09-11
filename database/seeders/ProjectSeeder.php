<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create([
            'title'=> 'PROYECTO 01',
            'user_id'=> 2,
        ]);
        Project::create([
            'title'=> 'PROYECTO 02',
            'user_id'=> 2,
        ]);
        Project::create([
            'title'=> 'PROYECTO 03',
            'user_id'=> 2,
        ]);
        Project::create([
            'title'=> 'PROYECTO 04',
            'user_id'=> 3,
        ]);
    }
}
