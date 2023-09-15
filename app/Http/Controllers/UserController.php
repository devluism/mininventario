<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function getUsers()
    {
        $users = User::where('role', 1)->get();
        return ($users)
        ? response()->json($users, 200)
        : response()->json(['message' => 'Error al obtener la lista de usuarios'], 400);
    }

    public function createModal()
    {
        return view('components.modals.createUserModal')->render();
    }

    public function create(Request $request)
    {
        try {
            $validated = $request->validate([
                'username'   => ['required'],
                'first_name' => ['required'],
                'last_name'  => ['required'],
                'password'   => ['required'],
                'email'      => ['required'],
                'role'       => ['required'],
            ]);
            
            if ($validated && ($request->password == $request->repeated_password)) {
                User::create([
                    'username'   => $request->username,
                    'first_name' => $request->first_name,
                    'last_name'  => $request->last_name,
                    'password'   => $request->password,
                    'email'      => $request->email,
                    'role'       => $request->role,
                ]);
                return back()->with([
                    'status'  => 'success',
                    'icon'    => 'check',
                    'message' => 'Jefe de projecto registrado!',
                ], 200);
            }
            throw "No se pudo registrar al fefe de proyecto";
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
