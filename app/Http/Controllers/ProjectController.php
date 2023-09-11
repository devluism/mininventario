<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(): View
    {
        $projects = Project::all();
        
        return view('project.index', compact('projects'));
    }

    public function setDatatable($id)
    {
        $projects = Project::where('id', $id)->get();

        return response()->json($projects);
    }
}
