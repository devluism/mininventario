<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Models\Product;
use App\Models\Project;
use App\Models\Movement;

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

                return redirect()->back();
            }
            
            abort('Error: No se pudo registrar la entrada', 500);
            
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
                        return back()->withErrors(['Cantidad' => 'La salida no puede mayor a la cantidad en inventario']);
                    }
                }

                return redirect()->back();
            }
            
            abort('Error: No se pudo registrar la salida', 500);
            
        } 
        catch (\Throwable $th) {
            throw $th;
        }
    }
}
