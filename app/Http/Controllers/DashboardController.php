<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\Collection;
use Yajra\DataTables\Facades\Datatables;

use App\Models\Project;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()->role != 0) {
            $projects = Project::where('user_id', Auth::user()->id)->get();
            foreach ($projects as $project) {
                $products[] += Product::where('project_id', $project->id)->with('warehouse', 'supplier')->get();
            }
        }
        else {
            $projects = Project::all();
            $products = Product::with('warehouse', 'supplier')->get();
        }
        
        if ($request->ajax()) {
            $products = ($request->id) ? Product::where('project_id', $request->id)->with('warehouse', 'supplier')->get() : $products;

            $data = new Collection();
            foreach ($products as $product) {
                $object = new \stdClass();
                $object->id          = $product->id;
                $object->description = $product->description;
                $object->stock       = number_format($product->stock, 0, ",", ".");
                $object->warehouse   = $product->warehouse->description;
                $object->supplier   = $product->supplier->name;
                $data->push($object);
            }

            return Datatables::of($data)->make(true);
        }

        return view('dashboard', compact('projects'));
    }

    public function filterByProject($project_id)
    {
        try {
            $products = ($project_id != 0) ? Product::where('project_id', $project_id)->with('warehouse', 'supplier')->get() : Product::with('warehouse', 'supplier')->get();
    
            $data = new Collection();
            foreach ($products as $product) {
                $object = new \stdClass();
                $object->id          = $product->id;
                $object->description = $product->description;
                $object->stock       = number_format($product->stock, 0, ",", ".");
                $object->warehouse   = $product->warehouse->description;
                $object->supplier   = $product->supplier->name;
                $data->push($object);
            }
    
            return Datatables::of($data)->make(true);
        }
        catch (\Throwable $th) {
            //throw $th;
            return abort("Error: ".$th, 404);
        }

    }
}
