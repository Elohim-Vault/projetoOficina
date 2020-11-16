@extends('header')
@section('conteudo')
    <form method="POST" action="{{ route('produtos.armazenar') }}">
        @csrf

        <div class="form-group">
            <label for="Nomeproduto">Codigo</label>
            <input type="text" class="form-control" id="Codigo" name="Codigo" >
        </div>

        <div class="form-group">
            <label for="Nomeproduto">Produto</label>
            <input type="text" class="form-control" id="Nomeproduto" name="Nomeproduto" >
        </div>

        <div class="form-group">
            <label for="Nomeproduto">Tipo</label>
            <input type="text" class="form-control" id="Tipoproduto" name="Tipoproduto" >
        </div>

        <div class="form-group">
            <label for="Nomeproduto">Marca</label>
            <input type="text" class="form-control" id="Marcaproduto" name="Marcaproduto" >
        </div>

        <div class="form-group">
            <label for="Nomeproduto">Quantidade</label>
            <input type="number" class="form-control" id="Quantidade" name="Quantidade" >
        </div>

        <label for="Valor">Valor unitario</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">R$</span>
            </div>
            <input type="number" class="form-control" name="Valor" id="Valor">
            <div class="input-group-append">
                <span class="input-group-text">.00</span>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
@endsection
