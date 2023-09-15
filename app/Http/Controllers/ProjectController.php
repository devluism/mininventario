<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Models\Project;
use App\Models\User;

class ProjectController extends Controller
{
    public function index(): View
    {
        $projects = Project::all();
        
        return view('project.index', compact('projects'));
    }

    public function getProjects()
    {
        $projects = Project::all();
        if (Auth::user()->role != 0) {
            $projects = Project::where('user_id', Auth::user()->id)->get();
        }

        return ($projects)
        ? response()->json($projects, 200)
        : response()->json(['message' => 'Error al obtener la lista de proyectos'], 400);
    }

    public function createModal()
    {
        $users  = User::all();
        return view('components.modals.createProjectModal', compact('users'))->render();
    }

    public function create(Request $request)
    {
        try {
            $validated = $request->validate([
                'title'   => ['required'],
                'user_id' => ['required'],
                'url'     => ['required'],
            ]);
            
            if ($validated) {
                Project::create([
                    'title'   => $request->title,
                    'url'     => '/home/localuser/descargas/prueba.csv',
                    'user_id' => $request->user_id,
                ]);
                return response()->json([
                    'status'  => 'success',
                    'icon'    => 'check',
                    'message' => 'Projecto registrado!',
                ], 200);
            }
            throw "No se pudo registrar el proyecto";
        } 
        catch (\Throwable $th) {
            return response()->json([
                'status' => 'danger',
                'icon'    => 'xmark',
                'message' => $th,
            ], 500);            
        }
    }
}
