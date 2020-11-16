@extends('header')
@section('conteudo')
    <form method="post" id="formServicos" action="{{ route('servicos.atualizar', $servico['IdServico'])}}">
        <h1>Cadastro de novos serviços</h1>
        @csrf

        @error('tipoServico')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="tipoServico">Tipo do serviço</label>
            <input type="text" class="form-control @error('tipoServico') is-invalid @enderror" id="tipoServico" name="Tiposervico" value="{{$servico['Tiposervico']}}"  required">
        </div>

        <div class="form-group">
            <label for="funcionarioSelect">Funcionário</label>
            <select class="custom-select" id="funcionarioSelect" name="IdFuncionario" required>
                <option value="{{ $servico->funcionarios->IdFuncionario }}" selected>{{ $servico->funcionarios->NomeFuncionario }}</option>
                @foreach($funcionarios as $funcionario)
                    @if($servico->funcionarios->IdFuncionario != $funcionario->IdFuncionario)
                        <option value="{{ $funcionario->IdFuncionario }}">{{ $funcionario->NomeFuncionario }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="carroSelect">Carro</label>
            <select class="custom-select" id="carroSelect" name="Carro" required>
                <option value="{{ $servico->carros->Idcarro }}" selected>{{ $servico->carros->Placa }}</option>
                @foreach($carros as $carro)
                    @if($servico->carros->Idcarro != $carro->Idcarro)
                        <option value="{{ $carro->Idcarro }}">{{ $carro->Placa }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="dataChegada">Recebimento do serviço</label>
            <input type="datetime-local" format="dd/mm/yyyy/" class="form-control" id="dataChegada" name="DataChegada" value="{{ $servico['DataChegada'] }}" required>
        </div>

        <div class="form-group">
            <label for="previsaoSaida">Previsão de conclusão</label>
            <input type="datetime-local" class="form-control" id="previsaoSaida" name="PrevisãoSaida" value="{{ $servico['Previsãosaida'] }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

@endsection
