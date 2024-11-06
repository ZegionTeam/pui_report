<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        return view('auth.login');
    }

    public function storeRegister(Request $request)
    {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ]);

        $user = User::create([
            'name' => $request->first_name . ' ' . $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'pegawai'
        ]);

        if ($user) {
            return redirect()->route('login')->with('success', 'Register success');
        } else {
            return redirect()->back()->with('error', 'Register failed');
        }
    }

    public function storeLogin(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email|exists:users,email',
                'password' => 'required',
            ]);

            $credentials = $request->only('email', 'password');

            $user = User::where('email', $request->email)->first();
            if ($user->role !== 'pegawai') {
                return redirect()->back()->with('error', 'Login failed');
            }

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->route('dashboard');
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Login failed');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
