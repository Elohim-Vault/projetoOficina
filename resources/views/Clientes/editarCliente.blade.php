@extends('header')
@section('conteudo')

    @if ($errors->any())
        <div class="alert alert-danger ">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="detalhesClientes" method="POST" action="{{ route('clientes.atualizar', $cliente) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="mt-5" for="nome">Nome do cliente</label>
            <input type="text" name="Nome" class="form-control" id="nome" value="{{ $cliente->Nome }}">
        </div>


        @if($cliente->fisico)
            <input type="hidden" value="fisico">
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" id="cpf" data-mask="000.000.000-00" name="Cpf"
                       value="{{ $cliente->Fisico->Cpf }}">
            </div>

            <div class="form-group">
                <label for="rg">RG</label>
                <input type="text" class="form-control" id="rg" data-mask="00.000.000-0" name="Rg"
                       value="{{ $cliente->Fisico->Rg}}">
            </div>
        @else
            <input type="hidden" value="juridico">
            <div class="form-group">
                <label for="cnpj">CNPJ</label>
                <input type="text" class="form-control" data-mask="00.000.000/0000-00" id="cnpj" name="CNPJ"
                       value="{{ $cliente->Juridico->CNPJ }}">
            </div>

            <div class="form-group">
                <label for="ins">Inscrição estadual</label>
                <input type="text" class="form-control" data-mask="000.000.000.000" id="ins" name="INS"
                       value="{{ $cliente->Juridico->INS }}">
            </div>

        @endif

        <div class="form-group">
            <label for="logradouro">Logradouro</label>
            <input type="text" class="form-control" name="Logradouro" id="logradouro"
                   value="{{ $cliente->endereco->Logradouro }}">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="cidade">Cidade</label>
                <input type="text" class="form-control" id="cidade" name="Cidade"
                       value="{{ $cliente->endereco->cidade->Cidade }}">
            </div>

            <div class="form-group col-md-6">
                <label for="bairro">Bairro</label>
                <input type="text" class="form-control" id="bairro" name="Bairro"
                       value="{{ $cliente->endereco->bairro->Bairro }}">
            </div>

            <div class="form-group col-md-3">
                <label for="numero">Número</label>
                <input type="text" class="form-control" id="numero" name="numero"
                       value="{{ $cliente->endereco->numero }}">
            </div>

            <div class="form-group col-md-3">
                <label for="cep">CEP</label>
                <input type="text" class="form-control" id="cep" name="CEP" data-mask="00000-000"
                       value="{{ $cliente->endereco->CEP }}">
            </div>
            @if($cliente->endereco->Complemento)
                <div class="form-group col-md-3">
                    <label for="complemento">Complemento</label>
                    <input type="text" class="form-control" id="complemento" name="Complemento"
                           value="{{ $cliente->endereco->Complemento }}">
                </div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Editar</button>
    </form>
@endsection
