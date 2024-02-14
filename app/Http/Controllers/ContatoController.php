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
        //  Validação
        $request->validate([
            'nome' => 'required|min:3|max:40',
            'email' => 'required',
            'motivo' => 'required',
            'mensagem' => 'required|max:4000',

        ]);
        // SiteContato::create($request->all());
    }
}
