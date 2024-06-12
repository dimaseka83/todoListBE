<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $user = User::where('email', $request->email)->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json([
                    'message' => 'Unauthorized'
                ], 401);
            }

            $token = auth()->login($user);

            return response()->json([
                'token' => $token,
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Login failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function register(Request $request)
    {
        try {
            // check if email already exists
            $check = User::where('email', $request->email)->first();
            if ($check) {
                return response()->json([
                    'message' => 'Email already exists'
                ], 400);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            $token = auth()->login($user);

            return response()->json([
                'message' => 'User registered successfully',
                'token' => $token,
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Register failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
