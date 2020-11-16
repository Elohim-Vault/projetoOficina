@extends('header')
@section('conteudo')
    <form method="POST" action="{{ route('clientes.armazenar') }}">
        @csrf
        <div class="form-group">
            <label for="nome">Nome da empresa</label>
            <input type="text" name="nome" class="form-control" id="nome" required>
        </div>

        <div class="form-group">
            <label for="cnpj">CNPJ</label>
            <input type="text" class="form-control" id="cnpj" name="cnpj" required>
        </div>

        <div class="form-group">
            <label for="ins">INS</label>
            <input type="text" class="form-control" id="ins" name="ins" required>
        </div>

        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" required>
        </div>

        <div class="form-group">
            <label for="logradouro">Logradouro</label>
            <input type="text" class="form-control" name="logradouro" id="logradouro" placeholder="Rua Jardim das palmas" required>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="cidade">Cidade</label>
                <input type="text" class="form-control" id="cidade" name="cidade" required>
            </div>

            <div class="form-group col-md-6">
                <label for="bairro">Bairro</label>
                <input type="text" class="form-control" id="bairro" name="bairro" required>
            </div>

            <div class="form-group col-md-3">
                <label for="numero">Número</label>
                <input type="text" class="form-control" id="numero" name="numero" required>
            </div>

            <div class="form-group col-md-3">
                <label for="cep">CEP</label>
                <input type="text" class="form-control" id="cep" name="cep" required>
            </div>

            <div class="form-group col-md-3">
                <label for="complemento">Complemento</label>
                <input type="text" class="form-control" id="complemento" name="complemento" >
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
@endsection

