<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warehouse;

class WarehouseController extends Controller
{
    public function getWarehouses()
    {
        $warehouses = Warehouse::all();
        return ($warehouses)
        ? response()->json($warehouses, 200)
        : response()->json(['message' => 'Error al obtener la lista de almacenes'], 400);
    }

    public function createModal()
    {
        return view('components.modals.createWarehouseModal')->render();
    }

    public function create(Request $request)
    {
        try {
            $validated = $request->validate([
                'description' => ['required'],
            ]);
            
            if ($validated) {
                Warehouse::create([
                    'description' => $request->description,
                ]);
                return back()->with([
                    'status'  => 'success',
                    'icon'    => 'check',
                    'message' => 'Almacen registrado!',
                ], 200);
            }
            throw "No se pudo registrar el almacen";
        } 
        catch (\Throwable $th) {
            return back()->with([
                'status' => 'danger',
                'icon'    => 'xmark',
                'message' => $th,
            ], 500);            
        }
    }
}
