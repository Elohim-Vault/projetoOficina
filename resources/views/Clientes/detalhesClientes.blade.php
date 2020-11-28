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
                    <input type="text" class="form-control" id="cpf" data-mask="000.000.000-00" name="cpf"
                           value="{{ $cliente->Fisico->Cpf }}">
                </div>

                <div class="form-group">
                    <label for="rg">RG</label>
                    <input type="text" class="form-control" id="rg" data-mask="00.000.000-0" name="rg"
                           value="{{ $cliente->Fisico->Rg}}">
                </div>
            @else
                <div class="form-group">
                    <label for="cnpj">CNPJ</label>
                    <input type="text" class="form-control" data-mask="00.000.000/0000-00" id="cnpj" name="cnpj"
                           value="{{ $cliente->Juridico->CNPJ }}">
                </div>

                <div class="form-group">
                    <label for="ins">Inscrição estadual</label>
                    <input type="text" class="form-control" data-mask="000.000.000.000" id="ins" name="ins"
                           value="{{ $cliente->Juridico->INS }}">
                </div>

            @endif

            <div class="form-group">
                <label for="logradouro">Logradouro</label>
                <input type="text" class="form-control" name="logradouro" id="logradouro"
                       value="{{ $cliente->endereco->Logradouro }}">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" id="cidade" name="cidade"
                           value="{{ $cliente->endereco->cidade->Cidade }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" id="bairro" name="bairro"
                           value="{{ $cliente->endereco->bairro->Bairro }}">
                </div>

                <div class="form-group col-md-3">
                    <label for="numero">Número</label>
                    <input type="text" class="form-control" id="numero" name="numero"
                           value="{{ $cliente->endereco->numero }}">
                </div>

                <div class="form-group col-md-3">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control" id="cep" name="cep" data-mask="00000-000"
                           value="{{ $cliente->endereco->CEP }}">
                </div>
                @if($cliente->endereco->Complemento)
                    <div class="form-group col-md-3">
                        <label for="complemento">Complemento</label>
                        <input type="text" class="form-control" id="complemento" name="complemento"
                               value="{{ $cliente->endereco->Complemento }}">
                    </div>
                @endif
            </div>
        </fieldset>

        <a href="{{ route('carros.cadastro', $cliente) }}" class="btn btn-primary">Adicionar um carro</a>
        <ul class="list-group mb-4" id="listCarros">
            <li class="list-group-item disabled" aria-disabled="true">Carros</li>
            @foreach($cliente->carros as $carro)
                <li class="list-group-item">
                    {{ $carro->Modelo }} {{ strtolower($carro->Cor) }} - {{$carro->Placa}}
                    <a href="{{ route('carros.deletar', $carro) }}" class="btn btn-danger ml-5"><i
                            class="fas fa-trash-alt"></i></a>
                    <a href="{{ route('carros.editar', $carro) }}" class="btn btn-warning ml-2"><i
                            class="fas fa-pen"></i></a>
                </li>

            @endforeach
        </ul>

        <a href="{{ route('telefones.cadastro', $cliente) }}" class="btn btn-primary mb-3">Adicionar um telefone</a>
        <ul class="list-group">
            <li class="list-group-item disabled" aria-disabled="true">Telefones</li>
            @foreach($cliente->telefones as $telefone)
                <li class="list-group-item">
                    {{ $telefone->Numero }} - {{$telefone->Tipo}}
                    <a href="{{ route('telefones.deletar', $telefone) }}" class="btn btn-danger ml-5"><i
                            class="fas fa-trash-alt"></i></a>
                    <a href="{{ route('telefones.editar', $telefone) }}" class="btn btn-warning ml-2"><i
                            class="fas fa-pen"></i></a>
                </li>
            @endforeach
        </ul>


    </form>
@endsection


