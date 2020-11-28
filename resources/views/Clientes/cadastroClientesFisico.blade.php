@extends('header')
@section('conteudo')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" id="formClienteFisico" action="{{ route('clientes.armazenar') }}">
        @csrf
        <div class="form-group">
            <label for="nome">Nome do cliente</label>
            <input type="text" name="nome" class="form-control" id="nome">
        </div>

        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" data-mask="000.000.000-00" id="cpf" name="cpf">
        </div>

        <div class="form-group">
            <label for="rg">RG</label>
            <input type="text" class="form-control" data-mask="00.000.000-0" id="rg" name="rg" required>
        </div>

        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" data-mask="00000-0000" id="telefone" name="telefone" required>
        </div>

        <div class="form-group">
            <label for="logradouro">Logradouro</label>
            <input type="text" class="form-control" name="logradouro" id="logradouro"
                   placeholder="Rua Jardim das palmas" required>
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
                <input type="number" class="form-control" id="numero" name="numero" required>
            </div>

            <div class="form-group col-md-3">
                <label for="cep">CEP</label>
                <input type="text" class="form-control" data-mask="00000-000" id="cep" name="cep" required>
            </div>

            <div class="form-group col-md-3">
                <label for="complemento">Complemento</label>
                <input type="text" class="form-control" id="complemento" name="complemento">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>

@endsection


