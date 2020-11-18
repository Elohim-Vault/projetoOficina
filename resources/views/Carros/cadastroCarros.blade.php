@extends('header')
@section('conteudo')

    <h1 class="text-center">Inserindo carro do cliente {{ $cliente->Nome }}</h1>
    <form method="POST" action="{{ route('carros.armazenar') }}">
        @csrf
        <input type="hidden" value="{{ $cliente->IdCliente }}" name="Proprietario">
        <div class="form-group">
            <label for="placa">Placa</label>
            <input type="text" class="form-control" id="placa" name="Placa">
        </div>

        <div class="form-group">
            <label for="cor">Cor</label>
            <input type="text" class="form-control" id="cor" name="Cor">
        </div>

        <div class="form-group">
            <label for="modelo">Modelo</label>
            <input type="text" class="form-control" id="modelo" name="Modelo">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
