@extends('header')
@section('conteudo')
    <button class="btn btn-primary mb-4">Atualizar o estoque</button>
    <form>
        <div class="form-row align-items-center">
            <div class="col-auto">
                <input type="text" class="form-control mb-2" id="search" name="search" placeholder="Procure seu produto">
            </div>
            <div class="col-auto">
                <select class="custom-select mb-2" id="atributoProduto" name="atributoProduto">
                    <option value="Codigo" selected>Código</option>
                    <option value="Nomeproduto">Nome</option>
                    <option value="Tipoproduto">Tipo</option>
                    <option value="Marcaproduto">Marca</option>
                </select>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-2">Procurar</button>
            </div>
        </div>
    </form>
    <table class="table table-striped table-bordered text-center" id="produtosTable">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Produto</th>
            <th scope="col">Tipo</th>
            <th scope="col">Marca</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Custo unitario</th>
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
