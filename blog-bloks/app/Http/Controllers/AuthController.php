<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Requests\AuthFormRequest;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Auth; 

class AuthController extends Controller
{
    public function register(Request $request){
            return view('auth.register');
    }
    
    public function saveUser(AuthFormRequest $request){
        $validated = $request->validated();

        User::create($validated);

        return redirect()
            ->route('login')
            ->with('success', 'Your account has been created! You can now login.');
        
    }

    public function login(Request $request){
        if($request->isMethod('get')){
            return view('auth.login');
        }

        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $remember = $request->has('remember_token') ? true : false; 

        if (Auth::attempt($credentials, $remember)){
            return redirect()
            ->route('home')
            ->with('success', 'You are logged in!');
        }

        return redirect()
            ->route('login')
            ->withErrors('Provided login information is not valid.');

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()
            ->route('home')
            ->with('success', 'You are logged out.');
    }
}
