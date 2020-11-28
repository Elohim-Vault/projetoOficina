@extends('header')
@section('conteudo')
    <form>
        <fieldset disabled>
            <div class="form-group">
                <label for="nome">Nome do funcionário</label>
                <input type="text" name="nome" class="form-control" id="nome" value="{{ $funcionario->NomeFuncionario }}">
            </div>

            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" data-mask="000.000.000-00" id="cpf" name="cpf" value="{{ $funcionario->Cpf }}">
            </div>

            <div class="form-group">
                <label for="cpf">RG</label>
                <input type="text" class="form-control" data-mask="00.000.000-0" id="rg" name="rg" value="{{ $funcionario->RG }}">
            </div>

            <div class="form-group">
                <label for="funcao">Função</label>
                <input type="text" class="form-control" id="funcao" name="funcao" value="{{ $funcionario->Funcao }}">
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="logradouro">Logradouro</label>
                    <input type="text" class="form-control" name="logradouro" id="logradouro" value="{{ $funcionario->endereco->Logradouro }}">
                </div>

                <div class="form-group col-md-4">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" id="cidade" name="cidade" value="{{ $funcionario->endereco->cidade->Cidade }}">
                </div>

                <div class="form-group col-md-4">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" id="bairro" name="bairro" value="{{ $funcionario->endereco->bairro->Bairro }}">
                </div>

                <div class="form-group col-md-1">
                    <label for="numero">Número</label>
                    <input type="text" class="form-control" id="numero" name="numero" value="{{ $funcionario->endereco->numero }}">
                </div>

                <div class="form-group col-md-2">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control" data-mask="00000-000" id="cep" name="cep" value="{{ $funcionario->endereco->CEP }}">
                </div>

                @if($funcionario->endereco->Complemento)
                    <div class="form-group col-md-3">
                        <label for="complemento">Complemento</label>
                        <input type="text" class="form-control" id="complemento" name="complemento" value="{{ $funcionario->endereco->Complemento }}">
                    </div>
                @endif
            </div>
            <div class="form-group col-md-1.5" >
                <label for="appt">Inicio do turno:</label><br>

                <input type="time" id="TurnoInicio" name="TurnoInicio"
                        required value="{{ $funcionario->TurnoInicio }}">
            </div>

            <div class="form-group col-md-1.5">
                <label for="appt">Fim do turno:</label><br>

                <input type="time" id="TurnoFim" name="TurnoFim"
                       value="{{ $funcionario->TurnoFim }}">
            </div>
        </fieldset>
    </form>

@endsection
