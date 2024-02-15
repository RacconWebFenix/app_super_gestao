<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index(Request $request)
    {

        if ($request->get('erro') == '1') {
            $erro = 'Usuário e senha não existem.';
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

        echo "Usuario: '$email' <br> Senha: '$password' ";

        $user = new User();

        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();

        if (isset($usuario->name)) {
            echo 'existe';
        } else {
            return redirect()->route('site.login', ['erro' => '1']);
        }
    }
}
