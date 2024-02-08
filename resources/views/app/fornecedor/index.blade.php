<h3>Fornececedor</h3>

<h3>

    @php

    @endphp
</h3>
@isset($fornecedores)
    @for ($i = 0; isset($fornecedores[$i]); $i++)
        <h3>
            Fornecedor: {{ $fornecedores[$i]['nome'] ?? '' }}
        </h3>
        <h3>
            Status: {{ $fornecedores[$i]['status'] ?? '' }}
        </h3>
        <h3>
            CNPJ: {{ $fornecedores[$i]['cnpj'] ?? '' }}
        </h3>
        <h3>
            DDD: {{ $fornecedores[$i]['ddd'] ?? '' }}
        </h3>
        <h3>
            Telefone: {{ $fornecedores[$i]['telefone'] ?? '' }}
        </h3>
        <hr>
    @endfor
@endisset
