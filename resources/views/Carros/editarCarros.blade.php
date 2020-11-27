@extends('header')
@section('conteudo')

    <h1 class="text-center">Alterando o carro {{ $carro->Modelo }}</h1>
    <form method="POST" action="{{ route('carros.atualizar', $carro) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="placa">Placa</label>
            <input type="text" class="form-control" id="placa" name="Placa" value="{{ $carro->Placa }}">
        </div>

        <div class="form-group">
            <label for="cor">Cor</label>
            <input type="text" class="form-control" id="cor" name="Cor" value="{{ $carro->Cor }}">
        </div>

        <div class="form-group">
            <label for="modelo">Modelo</label>
            <input type="text" class="form-control" id="modelo" name="Modelo" value="{{ $carro->Modelo }}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
