@extends('header')
@section('conteudo')
<form method="POST" action="{{ route('telefones.armazenar') }}">
    @csrf
    <h1>Cadastrando um telefone</h1>
    <input type="hidden" value="{{ $cliente }}" name="id">

    <div class="form-group">
        <label for="numero">Número</label>
        <input type="text" class="form-control" data-mask="00000-0000" id="numero" name="numero">
    </div>
    <button class="btn btn-primary" type="submit">Enviar</button>
</form>
@endsection
{{--<input type="text" class="form-control" placeholder="Ex.: dd/mm/aaaa" data-mask="00/00/0000" maxlength="10" autocomplete="off">--}}
