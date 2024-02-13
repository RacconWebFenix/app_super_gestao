<?php

namespace App\Http\Controllers;

use App\Models\SiteContato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {
        // $contato = new SiteContato();
        // $contato->nome = $request->input('nome');
        // $contato->email = $request->input('email');
        // $contato->telefone = $request->input('telefone');
        // $contato->motivo = $request->input('motivo');
        // $contato->mensagem = $request->input('mensagem');

        // $contato->save();

        // $contato = new SiteContato();
        // $contato->fill($request->all());

        // $contato->save();

        // if(!(empty($request->all()))){
        //     $contato = new SiteContato();
        //     $contato->create($request->all());
        // }
        // echo '<pre>';
        // print_r($contato->getAttributes());
        // echo '</pre>';
        return view('site.contato', ['titulo' => 'Contato']);
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
