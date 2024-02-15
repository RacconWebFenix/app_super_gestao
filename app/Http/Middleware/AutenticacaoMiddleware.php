<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao, $perfil): Response
    {

        echo $metodo_autenticacao . '<br>';

        if ($metodo_autenticacao == 'padrao') {
            echo 'verificar usuario e senha no banco de dados - ' . $perfil . '<br>';
        }
        if ($metodo_autenticacao == 'ldap') {
            echo 'verificar usuario e senha no AD - ' . $perfil . '<br>';
        }

        if ($perfil == 'visitante') {
            echo 'alguns recursos - ' . $perfil . '<br>';
        } else {
            echo 'Banco de dados' . $perfil . '<br>';
        }
        if (false) {
            return $next($request);
        } else {
            return Response('Acesso Negado! Rota exige autenticação!');
        }
    }
}
