<h3>Fornececedor</h3>

<h3>

    @php

    @endphp
</h3>
@isset($fornecedores)
    <h3>
        Fornecedor: {{ $fornecedores[0]['nome'] }}
    </h3>
    <h3>
        Status:{{ $fornecedores[0]['status'] }}
    </h3>
    <h3>
        CNPJ:{{ $fornecedores[0]['cnpj'] }}
    </h3>
    <hr>
    <h3>
        Fornecedor: {{ $fornecedores[1]['nome'] }}
    </h3>
    <h3>
        Status:{{ $fornecedores[1]['status'] }}
    </h3>
    <h3>
        @isset($fornecedores[1]['cnpj'])
            CNPJ:{{ $fornecedores[1]['cnpj'] }}
        @endisset
    </h3>
@endisset
