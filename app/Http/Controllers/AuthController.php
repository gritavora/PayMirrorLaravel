<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
    
            // Verifica o tipo de usuário
            if ($user->role === 'admin') {
                return redirect()->intended('/admin'); // Redireciona para a página do admin
            } else {
                return redirect()->intended('/colaboradores'); // Redireciona para a página do colaborador
            }
        }
    
        return back()->withErrors([
            'email' => 'Credenciais inválidas, tente novamente.',
        ]);
    }
    
}
