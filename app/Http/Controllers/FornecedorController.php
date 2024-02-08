<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = [
            0 => [
                'nome' => 'fornecedor1',
                'status' => 'N',
                'cnpj' => '516516165'
            ],
            1 => [
                'nome' => 'fornecedor2',
                'status' => 'S',
            ]
        ];

        $result = $fornecedores[0]['status'] == 'S' ?  $fornecedores[0]['nome'] : 'Ativo';

        return view('app.fornecedor.index', compact('fornecedores', 'result'));
        // return view('app.fornecedor.index');
    }
}
