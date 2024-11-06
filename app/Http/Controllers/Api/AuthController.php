<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
            'device_name' => 'required'
        ]);

        if ($validation->fails()) {
            return response()->json([
                'message' => 'Invalid data',
                'errors' => $validation->errors()
            ], 422);
        }

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $token = $user->createToken($request->device_name, ['*'], now()->addWeek())->plainTextToken;
            return response()->json([
                'token' => $token,
                'user' => $user
            ]);
        } else {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }
    }

    public function register(Request $request)
    {
        try {
            $validation = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8',
                'confirm_password' => 'required|same:password',
                'address' => 'required',
                'phone' => 'required',
            ]);

            if ($validation->fails()) {
                return response()->json([
                    'message' => 'Invalid data',
                    'errors' => $validation->errors()
                ], 422);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'address' => $request->address,
                'phone' => $request->phone
            ]);

            if ($user) return response()->json([
                'message' => 'User created successfully',
                'user' => $user
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed to create user',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        try {
            $user = Auth::guard('sanctum');
            // $user = User::findOrFail(Auth::guard('api')->user()->id);
            dd($user->user());
            $token = $user->currentAccessToken();
            dd($token);
            if (!$token) {
                return response()->json([
                    'message' => 'User is not logged in'
                ], 401);
            }

            $token->delete();
            return response()->json([
                'message' => 'Logged out successfully'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed to logout',
                'error' => $th->getMessage()
            ], 500);
        }
    }
}
