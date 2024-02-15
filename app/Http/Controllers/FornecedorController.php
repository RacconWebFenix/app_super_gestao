<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {

        return view('app.fornecedor.index');
    }

    public function listar(Request $request)
    {


        $fornecedores = Fornecedor::where('nome', 'like', '%' . $request->input('nome') . '%')
            ->where('nome', 'like', '%' . $request->input('nome') . '%')
            ->where('site', 'like', '%' . $request->input('site') . '%')
            ->where('uf', 'like', '%' . $request->input('uf') . '%')
            ->where('email', 'like', '%' . $request->input('email') . '%')
            ->get();

  
        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores]);
    }

    public function adicionar(Request $request)
    {
        $msg = '';

        if ($request->input('_token') != '') {
            // Validação

            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'email' => 'required|email',
                'uf' => 'required|max:2',
            ];

            $feedback = [
                'required' => 'Campo :attribute é obrigatório',
                'nome.min' => 'O campo :attribute precisa ter no mínimo 3 caracteres',
                'nome.max' => 'O campo :attribute precisa ter no máximo 40 caracteres',
                'min' => 'O campo :attribute precisa ter no mínimo 2 caracteres',
                'max' => 'O campo :attribute precisa ter no máximo 2 caracteres',
                'email' => 'É necessário informar um email válido.',
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();

            $fornecedor->create($request->all());

            $msg = 'Cadastro realizado com sucesso.';
        }

        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }
}
