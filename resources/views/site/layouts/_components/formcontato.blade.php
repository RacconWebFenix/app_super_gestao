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
        <option value="1"{{ old('motivo') == '1' ? 'selected' : '' }}>Dúvida</option>
        <option value="2"{{ old('motivo') == '2' ? 'selected' : '' }}>Elogio</option>
        <option value="3"{{ old('motivo') == '3' ? 'selected' : '' }}>Reclamação</option>
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
