<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use App\Models\SiteContato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {
        $motivo = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato', 'motivo' => $motivo]);
    }
    public function salvar(Request $request)
    {
        $regras =  [
            'nome' => 'required|min:3|max:40',
            'email' => 'required|email|unique:site_contatos',
            'telefone' => 'required',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000',

        ];

        $feedback =   [
            'required' => 'Obrigatório',
            'min' => 'Precisa ter no mínimo 3 caracteres',
            'max' => 'Precisa ter máximo 40 caracteres',
            'email' => 'O email informado não é válido',
            //  :attribute pega o nome do campo
            'unique' => 'O :attribute já existe no banco de dados'
        ];


        //  Validação
        $request->validate($regras, $feedback);
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
