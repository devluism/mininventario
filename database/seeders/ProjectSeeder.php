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
        // Luis Linares
        Project::create([
            'title'    => 'Intervención a la planta de tratamiento',
            'url' => '/home/localuser/descargas/prueba.csv',
            'user_id'  => 2,
        ]);
        Project::create([
            'title'    => 'Construcción de parada salida de la empresa',
            'url' => '/home/localuser/descargas/prueba.csv',
            'user_id'  => 2,
        ]);
        // Rina Lezama
        Project::create([
            'title'    => 'Recuperación de 15 de 23 Baños de la empresa',
            'url' => '/home/localuser/descargas/prueba.csv',
            'user_id'  => 3,
        ]);
        Project::create([
            'title'    => 'Construcción de depósito en Kukenan',
            'url' => '/home/localuser/descargas/prueba.csv',
            'user_id'  => 3,
        ]);
        Project::create([
            'title'    => 'Ampliación de la casilla del surtidor de diesel',
            'url' => '/home/localuser/descargas/prueba.csv',
            'user_id'  => 3,
        ]);
        // Anyelines Farias
        Project::create([
            'title'    => 'Adecuación de sede Gerencia Pequeña Minería',
            'url' => '/home/localuser/descargas/prueba.csv',
            'user_id'  => 4,
        ]);
        Project::create([
            'title'    => 'Construcción de cerca Perimétrica Centro de Molienda',
            'url' => '/home/localuser/descargas/prueba.csv',
            'user_id'  => 4,
        ]);
        // Giannina Benedetto
        Project::create([
            'title'    => 'Recuperación de áreas comunes del campamento San Luis B',
            'url' => '/home/localuser/descargas/prueba.csv',
            'user_id'  => 5,
        ]);
        // Elsy Goudet
        Project::create([
            'title'    => 'Recuperación de dos (2) viviendas por campamento para un total de 6 viviendas',
            'url' => '/home/localuser/descargas/prueba.csv',
            'user_id'  => 6,
        ]);
        // Becker Sanchez
        Project::create([
            'title'    => 'Construcción de Vivero / semillero',
            'url' => '/home/localuser/descargas/prueba.csv',
            'user_id'  => 7,
        ]);
        // Jorge Ramirez
        Project::create([
            'title'    => 'Rehabilitación de edificios administrativos en una I fase: edificio de geología y Revemin',
            'url' => '/home/localuser/descargas/prueba.csv',
            'user_id'  => 8,
        ]);
        // Esperanza Escobar
        Project::create([
            'title'    => 'Recuperación de los servicios médicos',
            'url' => '/home/localuser/descargas/prueba.csv',
            'user_id'  => 9,
        ]);
        // Ana Salinas
        Project::create([
            'title'    => 'Mejora y adecuación del Laboratorio de Planta Caratal',
            'url' => '/home/localuser/descargas/prueba.csv',
            'user_id'  => 10,
        ]);
        Project::create([
            'title'    => 'Mejora y adecuación del Laboratorio de Planta Revemin',
            'url' => '/home/localuser/descargas/prueba.csv',
            'user_id'  => 10,
        ]);
        // Franklin Pino
        Project::create([
            'title'    => 'Servicios del mantenimiento al motor de la Isadora de Mina Sosa Méndez',
            'url' => '/home/localuser/descargas/prueba.csv',
            'user_id'  => 11,
        ]);
        Project::create([
            'title'    => 'Adquisición de treinta (30) vagones para extracción del material',
            'url' => '/home/localuser/descargas/prueba.csv',
            'user_id'  => 11,
        ]);
        Project::create([
            'title'    => 'Servicio de mantenimiento al motor de la Isadora de Mina Sosa Méndez',
            'url' => '/home/localuser/descargas/prueba.csv',
            'user_id'  => 11,
        ]);
        Project::create([
            'title'    => 'Recuperación de la infraestructura del pozo',
            'url' => '/home/localuser/descargas/prueba.csv',
            'user_id'  => 11,
        ]);
        Project::create([
            'title'    => 'Recuperación de los dos (2) skip',
            'url' => '/home/localuser/descargas/prueba.csv',
            'user_id'  => 11,
        ]);
        // Betelgueuse Leon
        Project::create([
            'title'    => 'Incremento de la capacidad de almacenamiento de la laguna de cola I (levantamiento de dique)',
            'url' => '/home/localuser/descargas/prueba.csv',
            'user_id'  => 12,
        ]);
    }
}
