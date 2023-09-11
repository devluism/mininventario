<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Models\Product;
use App\Models\Project;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::all();
        
        return view('product.index', compact('products'));
    }

    public function setDatatable($project_id)
    {
        $products = Product::where('project_id', $project_id)->get();

        return response()->json($products);
    }
}
