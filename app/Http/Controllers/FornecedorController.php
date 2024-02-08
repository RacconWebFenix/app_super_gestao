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
                'cnpj' => '000.000.000.000.'
            ],
            1 => [
                'nome' => 'fornecedor2',
                'status' => 'S',
            ]
        ];
        return view('app.fornecedor.index', compact('fornecedores'));
        // return view('app.fornecedor.index');
    }
}
