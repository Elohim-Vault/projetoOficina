@extends('header')
@section('conteudo')
    <form method="POST" action="{{ route('telefones.atualizar', $telefone) }}">
        @csrf
        @method('PUT')
        <h1>Cadastrando um telefone</h1>
        <div class="form-group">
            <label for="numero">Número</label>
            <input type="text" class="form-control" id="numero" data-mask="0000-0000" name="Numero" value="{{ $telefone->Numero }}">
        </div>
        <button class="btn btn-primary" type="submit">Enviar</button>
    </form>
@endsection
