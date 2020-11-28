@extends('header')
@section('conteudo')




    <form method="post" id="formServicos" action="{{ route('servicos.atualizar', $servico)}}">

        <h1>Cadastro de novos serviços</h1>
        @csrf

        <div class="form-group">
            <label for="tipoServico">Tipo do serviço</label>
            <input type="text" class="form-control @error('tipoServico') is-invalid @enderror" id="tipoServico" name="Tiposervico" value="{{ $servico->Tiposervico }}" required>
        </div>

        <div class="form-group">
            <label for="dataChegada">Recebimento do serviço</label>
            <input type="datetime-local" format="dd/mm/yyyy/" class="form-control" id="dataChegada" name="DataChegada" value="{{ $servico->DataChegada }}" required>
        </div>

        <div class="form-group">
            <label for="previsaoSaida">Previsão de conclusão</label>
            <input type="datetime-local" class="form-control" id="previsaoSaida" name="PrevisãoSaida" value="{{ $servico->Previsãosaida }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Criar serviço</button>
@endsection


