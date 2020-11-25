@extends('header')
@section('conteudo')

<form method="POST" action="{{ route('holerite.atualizarPagamento', $pagamento) }}">
    @csrf
    @method('PUT')
    <h1 class="mb-3">Editar o pagamento de {{ $pagamento->funcionario->NomeFuncionario  }}</h1>
    <div class="form-group">
        <label for="horaExtra">Extra do funcionário</label>
        <input type="number" class="form-control" id="extra" name="extra">
    </div>
    <button type="submit" class="btn btn-primary">Alterar</button>
</form>
@endsection
