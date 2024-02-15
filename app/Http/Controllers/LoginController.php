<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index(Request $request)
    {
        $erro = '';

        if ($request->get('erro') == '1') {
            $erro = 'Usuário e senha não existem.';
        }

        if ($request->get('erro') == '2') {
            $erro = 'É necessario realizar login para ter acesso a página';
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request)
    {
        // Validação regras
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        $feedback = [
            'email' => 'É necessario possuir um email válido',
            'required' => 'Senha é obrigatória'
        ];

        $request->validate($regras, $feedback);

        $email =   $request->get('usuario');
        $password =  $request->get('senha');



        $user = new User();

        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();

        if (isset($usuario->name)) {
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;
            $_SESSION['id'] = $usuario->id;

            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro' => '1']);
        }
    }
    public function sair()
    {
        session_destroy();
        return redirect()->route('site.index');
    }
}
