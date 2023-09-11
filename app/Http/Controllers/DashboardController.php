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
        if ($request->ajax()) {
            $products = Product::all();

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
        else {
            switch (Auth::user()->role) {
                case 0:
                    $projects = Project::all();
                    $products = Product::with('warehouse', 'supplier')->get();
                    break;
    
                case 1:
                    $projects = Project::where('user_id', Auth::user()->id)->get();
                    foreach ($projects as $project) {
                        $products[] += Product::where('project_id', $project->id);
                    }
                    break;
    
                default:
                    $projects = Project::all();
                    $products = Product::all();
                    break;
            }
            return view('dashboard', compact('products', 'projects'));
        }


    }
}
