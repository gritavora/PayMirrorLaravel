<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    // Método para upload da foto de perfil
    public function uploadProfilePicture(Request $request)
    {
        // Validação e lógica para salvar a imagem
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = public_path('/uploads/profile_pictures'); // Defina o caminho onde deseja armazenar a imagem
            $file->move($path, $filename);

            // Aqui você deve atualizar o caminho da imagem no banco de dados
            Auth::user()->update(['profile_picture' => $filename]);

            return redirect()->route('upload.profile.picture')->with('success', 'Imagem de perfil atualizada com sucesso!');
        }

        return redirect()->back()->withErrors(['profile_picture' => 'Erro ao atualizar a imagem.']);
    }

    // Método para exibir o calendário no admin
    public function calendario()
    {
        return view('admin/calendario');
    }

    // Método para exibir os requerimentos no admin
    public function requerimentos()
    {
        return view('FunRequerimentos');
    }

    // Método para exibir o calendário dos colaboradores
    public function calendarioColaboradores()
    {
        return view('colaboradores/calendario');
    }

    // Método para exibir a página de pontos de hora dos colaboradores
    public function pontosHora()
    {
        // Aqui você pode adicionar a lógica que precisar
        return view('colaboradores.pontos-hora'); // Exemplo de view para pontos de hora dos colaboradores
    }
}
