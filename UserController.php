<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Exibir o formulário de login
    public function showLoginForm()
    {
        return view('login'); // Retorna a view 'login.blade.php'
    }

    // Processar o login
    public function login(Request $request)
    {
        // Validar os dados de entrada
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Tentar autenticar o usuário
        if (Auth::attempt($credentials)) {
            // Se a autenticação for bem-sucedida
            $request->session()->regenerate();
            return redirect()->intended('/dashboard'); // Redireciona para o dashboard
        }

        // Se a autenticação falhar
        return back()->withErrors([
            'email' => 'As credenciais fornecidas estão incorretas.',
        ]);
    }

    // Processar o logout
    public function logout(Request $request)
    {
        Auth::logout(); // Realiza o logout do usuário
        $request->session()->invalidate(); // Invalida a sessão
        $request->session()->regenerateToken(); // Regenera o token CSRF

        return redirect('/login'); // Redireciona para a página de login
    }
}
