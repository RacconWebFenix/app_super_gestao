<h3>Fornececedor</h3>

<h3>

    @php

    @endphp
</h3>

{{-- @dd($fornecedores) --}}

@if (count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem fornecedores cadastrados </h3>
@elseif(count($fornecedores) > 10)
    <h3>Existem Vários</h3>
@else
    <h3>Não existem fornecedores cadastrados</h3>
@endif

<h3>
    Fornecedor: {{ $fornecedores[0]['nome'] }}
</h3>
<h3>
    Status:{{ $fornecedores[0]['status'] }}
</h3>

@if (!($fornecedores[0]['status'] == 'S'))
    <h2>Fornecedor Inativo</h2>
@endif


@unless ($fornecedores[0]['status'] == 'S')
    <h2>Fornecedor Inativo com unless</h2>
@endunless
