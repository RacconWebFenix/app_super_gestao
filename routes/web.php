<?php


use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'index'])
    ->name('site.index');

Route::get('/sobre', [\App\Http\Controllers\SobreController::class, 'sobre'])->middleware('log.acesso')->name('site.sobre');

Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');

Route::post('/contato', [\App\Http\Controllers\ContatoController::class, 'salvar'])->name('site.contato');

Route::get('/login/{erro?}', [\App\Http\Controllers\LoginController::class, 'index'])->name('site.login');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'autenticar'])->name('site.login');

Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(
    function () {
        Route::get('/clientes', function () {
            return 'clientes';
        })->name('app.clientes');

        Route::get('/fornecedores', [\App\Http\Controllers\FornecedorController::class, 'index'])->name('app.fornecedores');


        Route::get('/produtos', function () {
            return 'produtos';
        })->name('app.produtos');
    }
);


Route::get('/teste/{p1}/{p2}', [\App\Http\Controllers\TesteController::class, 'teste'])->name('site.teste');



Route::fallback(function () {
    echo 'rota não existente <a href="' . route('site.index') . '">clique aqui</a>';
});
