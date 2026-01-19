<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Mostrar formulário de login
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Processar login
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/home')->with('message', 'Login realizado com sucesso!');
        }

        return back()->withErrors([
            'email' => 'Email ou palavra-passe incorretos.',
        ]);
    }

    /**
     * Efetuar logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Logout realizado com sucesso!');
    }

    /**
     * Mostrar formulário de registo
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Processar registo
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);
        return redirect('/home')->with('message', 'Registo realizado com sucesso!');
    }
}
