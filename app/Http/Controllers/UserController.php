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
 
// Exemplo de método no controlador
// app/Http/Controllers/UserController.php

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
        // Exemplo: Auth::user()->update(['profile_picture' => $filename]);

        return redirect()->route('upload.profile.picture')->with('success', 'Imagem de perfil atualizada com sucesso!');
    }

    return redirect()->back()->withErrors(['profile_picture' => 'Erro ao atualizar a imagem.']);
}


    
    

}
