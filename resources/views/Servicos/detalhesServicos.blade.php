@extends('header')
@section('conteudo')

    <form id="detalhesClientes">
        <fieldset disabled>
            <div class="form-group">
                <label for="nome">Tipo do serviço</label>
                <input type="text" name="nome" class="form-control" id="nome" value="{{ $servico->Tiposervico }}">
            </div>

                <div class="form-group">
                    <label for="cpf">Status</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" value="{{ $servico->StatusServ }}">
                </div>

                <div class="form-group">
                    <label for="rg">Data de inicio:</label>
                    <input type="datetime" format="dd/mm/yyyy/ h:m:s" class="form-control" id="rg" name="rg" value="{{ date('d/m/Y h:m:s', strtotime($servico->DataChegada)) }}">
                </div>

                <div class="form-group">
                    <label for="cnpj">Previsão de termino:</label>
                    <input type="datetime" format="dd/mm/yyyy/ h:m:s" class="form-control" id="rg" name="rg" value="{{ date('d/m/Y h:m:s', strtotime($servico->Previsãosaida)) }}">
                </div>

            <h1>Carro</h1>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="cidade">Proprietario</label>
                    <input type="text" class="form-control" id="cidade" name="cidade" value="{{ $servico->carros->proprietarios->Nome }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="bairro">Placa</label>
                    <input type="text" class="form-control" id="bairro" name="bairro" value="{{ $servico->carros->Placa }}">
                </div>

                <div class="form-group col-md-3">
                    <label for="numero">Cor</label>
                    <input type="text" class="form-control" id="numero" name="numero" value="{{$servico->carros->Cor}}">
                </div>

                <div class="form-group col-md-3">
                    <label for="cep">Modelo</label>
                    <input type="text" class="form-control" id="cep" name="cep" value="{{ $servico->carros->Modelo }}">
                </div>
            </div>


            <ul class="list-group text-center">
                <li class="list-group-item disabled" aria-disabled="true">Funcionários</li>
                @foreach($servico->funcionarios as $funcionario)
                <li class="list-group-item"><a href="{{ route('funcionarios.detalhes', $funcionario->IdFuncionario ) }}">{{ $funcionario->NomeFuncionario }}</a></li>
                @endforeach
            </ul>
            <br>
            @if($servico->produtos)
                <ul class="list-group text-center">
                    <li class="list-group-item disabled" aria-disabled="true">Produtos usados</li>
                    @foreach($servico->produtos as $produto)
                        <li class="list-group-item">{{ $produto->Nomeproduto }}</li>
                    @endforeach
                </ul>
            @endif

        </fieldset>

    </form>
@endsection





