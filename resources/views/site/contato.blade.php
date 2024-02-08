@extends('site.layouts.layout')
@section('titulo', $titulo)
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Entre em contato conosco</h1>
        </div>

        <div class="informacao-pagina">
            <div class="contato-principal">
                @component('site.layouts._components.formcontato', ['classe' => 'borda-preta'])
                    <p>A nossa equipe analisara...</p>
                    <p>Nosso tem é de ....</p>
                @endcomponent
            </div>
        </div>
    </div>

    @include('site.layouts._partials.rodape')
@endsection
