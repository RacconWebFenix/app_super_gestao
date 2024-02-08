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
        CNPJ:{{ $fornecedores[1]['cnpj'] ?? 'Dado nao preenchido' }}
    </h3>
    <h3>
        Telefone: {{ $fornecedores[1]['ddd'] ?? '' }} {{ $fornecedores[1]['telefone'] ?? '' }}
        @switch($fornecedores[0]['ddd'])
            @case('11')
                São Paulo
            @break

            @case('32')
                Juiz de fora
            @break

            @case('85')
                Fortaleza
            @break

            @default
                Estado nao indent
        @endswitch
    </h3>
@endisset
