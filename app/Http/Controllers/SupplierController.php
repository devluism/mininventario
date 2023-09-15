<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function getSuppliers()
    {
        $suppliers = Supplier::all();
        return ($suppliers)
        ? response()->json($suppliers, 200)
        : response()->json(['message' => 'Error al obtener la lista de proveedores'], 400);
    }

    public function createModal()
    {
        return view('components.modals.createSupplierModal')->render();
    }

    public function create(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => ['required'],
                'code' => ['required'],
            ]);
            
            if ($validated) {
                Supplier::create([
                    'name' => $request->name,
                    'code' => $request->code,
                ]);
                return back()->with([
                    'status'  => 'success',
                    'icon'    => 'check',
                    'message' => 'Proveedor registrado!',
                ], 200);
            }
            throw "No se pudo registrar el proveedor";
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
