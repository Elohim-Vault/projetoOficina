@extends('header')
@section('conteudo')
    <button class="btn btn-primary mb-4">Atualizar o estoque</button>
    <table class="table table-striped table-bordered text-center">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Produto</th>
            <th scope="col">Tipo</th>
            <th scope="col">Marca</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Preço unitario</th>
        </tr>
        </thead>
        <tbody>
        @foreach($produtos as $produto)
        <tr>
            <th scope="row">{{ $produto->Codigo }}</th>
            <td>{{ $produto->Nomeproduto }}</td>
            <td>{{ $produto->Tipoproduto }}</td>
            <td>{{ $produto->Marcaproduto }}</td>
            <td>{{ $produto->Quantidade }}</td>
            <td>{{ $produto->Valor }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>

    @if($produtos->previousPageUrl())
        <a href="{{ $servicos->previousPageUrl() }}"><i class="left-arrow" class="fas fa-angle-left"></i></a>
    @endif

    @if($produtos->nextPageUrl())
        <a href="{{ $servicos->nextPageUrl() }}"><i class="right-arrow" class="fas fa-angle-right"></i></a>
    @endif
@endsection
