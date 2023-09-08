<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{

    /**
     * Get a JWT via given credentials.
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $user = User::where('email', $request->email)->first();

        if(!$user) {
            return response()->json(['message' => 'Usuario no registrado.'], 200);
        }

        if () {

        }
            
        
        if ($responseObject->success && $user) {
            DB::commit();
            return response()->json(['success' => true, 'token' => $token, 'em' => $request->email, 'message' => 'Inicio de sesión exitoso.'],200);
            return response()->json($data, 200);
        }

        DB::rollBack();
        return response()->json(['message' => $responseObject->message], 400);
    }

    public function logout(Request $request)
    {
        $user = User::findOrFail($request->auth_user_id);
    }
}