<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        if (!Auth::attempt($fields)) {
            return response()->json([
                'status' => 'error',
                'code' => 401,
                'message' => 'Usuário ou senha inválidos'
            ], 401);
        }
        // Check email
        $user = User::where('email', $fields['email'])->first();
        $token = $user->createToken('consultadepessoas')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout()
    {
        $user = Auth::user();
        $user->tokens()->delete();

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'Logout efetuado com sucesso'
        ], 200);
    }
}
