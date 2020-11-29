@extends('header')
@section('conteudo')

    <form method="POST" action="{{ route('produtos.atualizar', $produto) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="Nomeproduto">Nome do produto</label>
            <input type="text" class="form-control" id="Nomeproduto" name="Nomeproduto" value="{{ $produto->Nomeproduto }}">
        </div>

        <div class="form-group">
            <label for="Tipoproduto">Tipo do produto</label>
            <input type="text" class="form-control" id="Tipoproduto" name="Tipoproduto" value="{{ $produto->Tipoproduto }}">
        </div>

        <div class="form-group">
            <label for="Marcaproduto">Marca do produto</label>
            <input type="text" class="form-control" id="Marcaproduto" name="Marcaproduto" value="{{ $produto->Marcaproduto }}">
        </div>
        <button class="btn btn-primary" type="submit">Editar</button>
    </form>
@endsection
