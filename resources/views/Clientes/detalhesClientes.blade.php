@extends('header')
@section('conteudo')
    <form id="detalhesClientes">
        <fieldset disabled>
            <div class="form-group">
                <label for="nome">Nome do cliente</label>
                <input type="text" name="nome" class="form-control" id="nome" value="{{ $cliente->Nome }}">
            </div>


            @if($cliente->fisico)
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" value="{{ $cliente->Fisico->Cpf }}">
                </div>

                <div class="form-group">
                    <label for="rg">RG</label>
                    <input type="text" class="form-control" id="rg" name="rg" value="{{ $cliente->Fisico->Rg}}">
                </div>
            @else
                <div class="form-group">
                    <label for="cnpj">CNPJ</label>
                    <input type="text" class="form-control" id="cnpj" name="cnpj" value="{{ $cliente->Juridico->CNPJ }}">
                </div>

                <div class="form-group">
                    <label for="ins">INS</label>
                    <input type="text" class="form-control" id="ins" name="ins" value="{{ $cliente->Juridico->INS }}">
                </div>

            @endif


            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" value="{{ $cliente->telefones->Numero }}">
            </div>

            <div class="form-group">
                <label for="logradouro">Logradouro</label>
                <input type="text" class="form-control" name="logradouro" id="logradouro" value="{{ $cliente->endereco[0]->Logradouro }}">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" id="cidade" name="cidade" value="{{ $cliente->endereco[0]->cidade->Cidade }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" id="bairro" name="bairro" value="{{ $cliente->endereco[0]->bairro->Bairro }}">
                </div>

                <div class="form-group col-md-3">
                    <label for="numero">Número</label>
                    <input type="text" class="form-control" id="numero" name="numero" value="{{ $cliente->endereco[0]->numero }}">
                </div>

                <div class="form-group col-md-3">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control" id="cep" name="cep" value="{{ $cliente->endereco[0]->CEP }}">
                </div>
                @if($cliente->endereco[0]->Complemento)
                <div class="form-group col-md-3">
                    <label for="complemento">Complemento</label>
                    <input type="text" class="form-control" id="complemento" name="complemento" value="{{ $cliente->endereco[0]->Complemento }}">
                </div>
                @endif

        </fieldset>
            <a href="{{ route('carros.cadastro') }}"class="btn btn-primary">Adicionar um carro</a>
            </div>
    </form>
@endsection

