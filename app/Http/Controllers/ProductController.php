<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Models\Product;
use App\Models\Project;
use App\Models\Warehouse;
use App\Models\Supplier;
use App\Models\Movement;

use Illuminate\Database\Eloquent\Collection;
use Yajra\DataTables\Facades\Datatables;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::all();
        
        return view('product.index', compact('products'));
    }

    public function setDatatable(Request $request)
    {
        try {
            if (isset($request->project_id) && $request->project_id != 0) {
                $products = Product::where('project_id', $request->project_id)->with('project', 'warehouse', 'supplier')->get();
            }
            elseif (isset($request->user_id) && $request->user_id != 0) {
                $projects = Project::where('user_id', $request->user_id)->get();
                $products = new Collection();
                foreach ($projects as $project) {
                    foreach (Product::where('project_id', $project->id)->with('project', 'warehouse', 'supplier')->get() as $product) {
                        $products[] = $product;
                    }
                }            }
            elseif (Auth::user()->role != 0) {
                $projects = Project::where('user_id', Auth::user()->id)->get();
                $products = new Collection();
                foreach ($projects as $project) {
                    foreach (Product::where('project_id', $project->id)->with('project', 'warehouse', 'supplier')->get() as $product) {
                        $products[] = $product;
                    }
                }
            }
            else {
                $products = Product::with('project', 'warehouse', 'supplier')->get();
            }
    
            $data = new Collection();
            foreach ($products as $product) {
                $object = new \stdClass();
                $object->user        = $product->project->user->fullName();
                $object->project     = $product->project->title;
                $object->id          = $product->id;
                $object->description = $product->description;
                $object->stock       = number_format($product->stock, 0, ",", ".");
                $object->warehouse   = $product->warehouse->description;
                $object->supplier    = $product->supplier->name;
                $data->push($object);
            }
    
            return Datatables::of($data)->make(true);
        }
        catch (\Throwable $th) {
            //throw $th;
            return back()->with([
                'status' => 'danger',
                'icon'    => 'xmark',
                'message' => $th,
            ], 500); 
        }

    }

    public function createModal()
    {
        $projects  = Project::all();
        $warehouses = Warehouse::all();
        $suppliers  = Supplier::all();
        return view('components.modals.createProductModal', compact('projects', 'warehouses', 'suppliers'))->render();
    }

    public function incomingModal($product_id)
    {
        $product = Product::where('id', $product_id)->with('warehouse', 'supplier')->first();
        return view('components.modals.incomingModal', compact('product'))->render();
    }

    public function incoming(Request $request)
    {
        try {
            $validated = $request->validate([
                'product_id'    => ['required'],
                'delivery_name' => ['required'],
                'delivery_id'   => ['required'],
                'amount'        => ['required'],
                'receiver_name' => ['required'],
                'receiver_id'   => ['required'],
                'type'          => ['required'],
            ]);
            
            if ($validated) {
                $movement = Movement::create([
                    'product_id'    => $request->product_id,
                    'delivery_name' => $request->delivery_name,
                    'delivery_id'   => $request->delivery_id,
                    'amount'        => $request->amount,
                    'receiver_name' => $request->receiver_name,
                    'receiver_id'   => $request->receiver_id,
                    'type'          => $request->type,
                ]) ?? false;

                if ($movement) {
                    $product = Product::where('id', $request->product_id)->first();
                    $product->update([
                        'stock' => ($product->stock + $request->amount)
                    ]);
                }
                return back()->with([
                    'status'  => 'success',
                    'icon'    => 'check',
                    'message' => 'Entrada registrada!',
                ], 200);
            }
            return back()->with([
                'status' => 'danger',
                'icon'    => 'xmark',
                'message' => 'La entrada no pudo ser registrada',
            ], 500);            
        } 
        catch (\Throwable $th) {
            throw $th;
        }
    }

    public function outgoingModal($product_id)
    {
        $product = Product::where('id', $product_id)->with('warehouse', 'supplier')->first();
        return view('components.modals.outgoingModal', compact('product'))->render();
    }

    public function outgoing(Request $request)
    {
        try {
            $validated = $request->validate([
                'product_id'    => ['required'],
                'delivery_name' => ['required'],
                'delivery_id'   => ['required'],
                'amount'        => ['required'],
                'receiver_name' => ['required'],
                'receiver_id'   => ['required'],
                'type'          => ['required'],
            ]);
            
            if ($validated) {
                $movement = Movement::create([
                    'product_id'    => $request->product_id,
                    'delivery_name' => $request->delivery_name,
                    'delivery_id'   => $request->delivery_id,
                    'amount'        => $request->amount,
                    'receiver_name' => $request->receiver_name,
                    'receiver_id'   => $request->receiver_id,
                    'type'          => $request->type,
                ]) ?? false;

                if ($movement) {
                    $product = Product::where('id', $request->product_id)->first();
                    if ($request->amount <= $product->stock) {
                        $product->update([
                            'stock' => $product->stock - $request->amount
                        ]);
                    }
                    else {
                        return back()->with([
                            'status' => 'warning',
                            'icon'    => 'exclamation',
                            'message' => 'La salida es mayor a la existencia',
                        ], 500);
                    }
                }
                return back()->with([
                    'status'  => 'success',
                    'icon'    => 'check',
                    'message' => 'Salida registrada!',
                ], 200);
            }            
            return back()->with([
                'status' => 'danger',
                'icon'    => 'xmark',
                'message' => 'La salida no pudo ser registrada',
            ], 500);
            
        } 
        catch (\Throwable $th) {
            throw $th;
        }
    }

    // API
    public function create(Request $request)
    {
        try {
            $validated = $request->validate([
                'description'  => ['required'],
                'stock'        => ['required'],
                'project_id'   => ['required'],
                'warehouse_id' => ['required'],
                'supplier_id'  => ['required'],
            ]);
            
            if ($validated) {
                $product = Product::create([
                    'description'  => $request->description,
                    'stock'        => $request->stock,
                    'project_id'   => $request->project_id,
                    'warehouse_id' => $request->warehouse_id,
                    'supplier_id'  => $request->supplier_id,
                ]);
                return back()->with([
                    'status'  => 'success',
                    'icon'    => 'check',
                    'message' => 'Producto registrado!',
                ], 200);
            }
            throw "No se pudo registrar el producto";
        } 
        catch (\Throwable $th) {
            return back()->with([
                'status' => 'danger',
                'icon'    => 'xmark',
                'message' => $th,
            ], 500);            
        }
    }

    public function delete(Request $request)
    {
        try {
            $product = Product::destroy($request->id);
            return response()->json([
                'status'  => 'success',
                'icon'    => 'check',
                'message' => 'Producto eliminado!',
            ], 200);
        } 
        catch (\Throwable $th) {
            return response()->json([
                'status'  => 'danger',
                'icon'    => 'xmark',
                'message' => 'No se pudo elimnar el producto',
                'error'   => $th,
            ], 500);            
        }
    }
}
