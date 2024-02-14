{{ $slot }}
<form method="POST" action="{{ route('site.contato') }}">
    @csrf
    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="{{ $classe }}">
    <br>
    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="{{ $classe }}">
    <br>
    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="{{ $classe }}">
    <br>
    <select name="motivo" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo as $key => $item)
            <option value="{{ $item->id }}" {{ old('motivo') == $item->id ? 'selected' : '' }}>
                {{ $item->motivo_contato }}
            </option>
        @endforeach


    </select>
    <br>
    <textarea name="mensagem" value="{{ old('mensagem') }}" class="{{ $classe }}">{{ old('mensagem') != '' ? old('mensagem') : 'Digite sua mensagem' }}</textarea>
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>


<div style="position: absolute; top:0px; left:0px; width: 100%; background: red;">
    <pre>
        {{ print_r($errors) }}
    </pre>
</div>
