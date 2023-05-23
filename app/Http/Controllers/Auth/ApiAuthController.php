<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiAuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'birth_date' => ['required'],
            'gender' => ['required'],
            'country' => ['required']
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'is_active' => true,
            'is_admin' => false
        ]);
        $user->user_detail()->create([
            'birth_date' => $data['birth_date'],
            'gender' => $data['gender'],
            'country' => $data['country']
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        $response = [
            'flag' => 'success',
            'data' => [
                'token' => $token
            ]
        ];

        return response($response, 201);
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $data['email'])->where('is_active', true)->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response([
                'flag' => "error",
                'message' => 'Hatalı giriş!'
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        $response = [
            'flag' => 'success',
            'data' => [
                'token' => $token
            ]
        ];

        return response($response, 201);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
    }
}
