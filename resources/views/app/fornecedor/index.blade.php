<h3>Fornececedor</h3>

<h3>

    @php

    @endphp
</h3>
@isset($fornecedores)
    @forelse ($fornecedores as $item)
        Iteração atual: {{ $loop->iteration }}
        <h3>
            Fornecedor: {{ $item['nome'] ?? '' }}
        </h3>
        <h3>
            Status: {{ $item['status'] ?? '' }}
        </h3>
        <h3>
            CNPJ: {{ $item['cnpj'] ?? '' }} oi?
        </h3>
        <h3>
            DDD: {{ $item['ddd'] ?? '' }}
        </h3>
        <h3>
            Telefone: {{ $item['telefone'] ?? '' }}
        </h3>
        <hr>
        @if ($loop->last)
            This is the last iteration

            <h2>
                Total: {{ $loop->count }}
            </h2>
        @endif

    @empty
        Não existe fornecedores
    @endforelse


@endisset
