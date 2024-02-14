<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function index()
    {
        $motivo = MotivoContato::all();

        return view('site.principal',  ['titulo' => 'Home', 'motivo' => $motivo]);
    }
}
