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
                'cnpj' => '0',
                'ddd' => '11',
                'telefone' => '4567'
            ],
            1 => [
                'nome' => 'fornecedor2',
                'status' => 'S',
                'cnpj' => '',
                'ddd' => '85',
                'telefone' => '4567'
            ],
            2 => [
                'nome' => 'fornecedor3',
                'status' => 'S',
                'cnpj' => '54652231',
                'ddd' => '32',
                'telefone' => '5644564567'
            ]
        ];

        $result = $fornecedores[0]['status'] == 'S' ?  $fornecedores[0]['nome'] : 'Ativo';

        return view('app.fornecedor.index', compact('fornecedores', 'result'));
        // return view('app.fornecedor.index');
    }
}
