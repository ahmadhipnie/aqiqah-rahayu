<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function dashboard()
    {
        
        return view('admin.dashboard');

    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $credentials['email'])->first();


        if ($user && Hash::check($credentials['password'], $user->password)) {

            Auth::login($user);

            Alert::success('Login Successful', 'Welcome back, ' . $user->name);
            return redirect()->route('admin.dashboard')->with('success', 'Login successful');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    public function logout()
    {
        Auth::logout();
        Alert::success('Logout Successful', 'You have been logged out successfully');
        return redirect()->route('login')->with('success', 'Logged out successfully');
    }
}
