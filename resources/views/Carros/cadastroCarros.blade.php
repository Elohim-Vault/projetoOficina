@extends('header')
@section('conteudo')
    <h1>Cadastro dos carros</h1>
    <form method="POST" action="{{ route('carros.armazenar') }}">
        @csrf
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

        <div class="form-group">
            <label for="proprietarioSelect">Clientes</label>
            <select multiple class="custom-select @error('funcionarioSelect') is-invalid @enderror" id="funcionarioSelect" name="Proprietario" required>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->IdCliente }}">{{ $cliente->Nome }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
