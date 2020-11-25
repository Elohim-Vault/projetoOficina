@extends('header')
@section('conteudo')




    <form method="post" id="formServicos" action="{{ route('servicos.armazenar')}}">
        <div class="card mb-3 w-50">
            <div class="card-header">Escolha uma opção (não selecionar nada irá gerar orçamento e cadastrar o serviço)</div>
            <div class="card-body">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="option" id="exampleRadios1" value="true">
                    <label class="form-check-label" for="exampleRadios1">
                        Gerar orçamento e não cadastrar serviço
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="option" id="exampleRadios2" value="false">
                    <label class="form-check-label" for="exampleRadios2">
                        Não gerar orçamento e cadastrar serviço
                    </label>
                </div>
            </div>
        </div>

        <h1>Cadastro de novos serviços</h1>
        @csrf

        <div class="form-group">
            <label for="tipoServico">Tipo do serviço</label>
            <input type="text" class="form-control @error('tipoServico') is-invalid @enderror" id="tipoServico" name="Tiposervico" required>
        </div>

        <div class="form-group">
            <label for="funcionarioSelect">Funcionário</label>
            <select multiple class="custom-select @error('funcionarioSelect') is-invalid @enderror" id="funcionarioSelect" name="IdFuncionario[]" required>
                @foreach($funcionarios as $funcionario)
                    <option value="{{ $funcionario->IdFuncionario }}">{{ $funcionario->NomeFuncionario }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="carroSelect">Carro</label>
            <select class="custom-select @error('carroSelect') is-invalid @enderror" id="carroSelect" name="Carro" required>
                <option value="">Selecione um carro</option>
                @foreach($carros as $carro)
                    <option value="{{ $carro['Idcarro'] }}">{{ $carro['Placa'] }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="produtoSelect">Produtos</label>
                <table class="table" class="scrollTable">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Quantidade</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($produtos as $produto)
                        @if($produto->Quantidade > 0 )
                            <tr>
                                <td scope="row">{{ $produto->Codigo }}</td>
                                <td>{{ $produto->Nomeproduto }}</td>
                                <td><input type="number" min="0" name="produtos[{{ $produto->Codigo }}]" max="{{ $produto->Quantidade }}"></td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>

        </div>

        <div class="form-group">
            <label for="dataChegada">Recebimento do serviço</label>
            <input type="datetime-local" format="dd/mm/yyyy/" class="form-control" id="dataChegada" name="DataChegada" required>
        </div>

        <div class="form-group">
            <label for="previsaoSaida">Previsão de conclusão</label>
            <input type="datetime-local" class="form-control" id="previsaoSaida" name="PrevisãoSaida"required>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">R$</span>
            </div>
            <input type="number" class="form-control" name="valor" id="valor">
            <div class="input-group-append">
                <span class="input-group-text">.00</span>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Criar serviço</button>
@endsection


