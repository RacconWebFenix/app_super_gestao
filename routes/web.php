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
        Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])
            ->name('app.home');
        Route::get('/sair', [\App\Http\Controllers\LoginController::class, 'sair'])
            ->name('app.sair');
        Route::get(
            '/cliente',
            [\App\Http\Controllers\ClienteController::class, 'index']
        )->name('app.cliente');
        Route::get('/fornecedor', [\App\Http\Controllers\FornecedorController::class, 'index'])->name('app.fornecedor');
        Route::get('/produto', [\App\Http\Controllers\ProdutoController::class, 'index'])->name('app.produto');
    }
);


Route::get('/teste/{p1}/{p2}', [\App\Http\Controllers\TesteController::class, 'teste'])->name('site.teste');



Route::fallback(function () {
    echo 'rota não existente <a href="' . route('site.index') . '">clique aqui</a>';
});
