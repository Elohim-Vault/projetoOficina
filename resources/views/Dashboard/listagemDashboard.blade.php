@extends('header')
@section('conteudo')
<div class="row">
    <div class="card ml-3 mb-3 mr-3" style="width: 15rem;">
        <div class="card-body">
            <h5 class="card-title">Ganho</h5>
            <h3 class="text-center font-weight-bold">2500</h3>
        </div>
    </div>

    <div class="card mb-3 mr-3" style="width: 15rem;">
        <div class="card-body">
            <h5 class="card-title">Produtos em falta</h5>
            <h3 class="text-center font-weight-bold">2500</h3>
        </div>
    </div>

    <div class="card mb-3 mr-3" style="width: 15rem;">
        <div class="card-body">
            <h5 class="card-title">Ganho</h5>
            <h3 class="text-center font-weight-bold">2500</h3>
        </div>
    </div>
</div>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Valor</th>
            <th scope="col">Justificativa</th>
        </tr>
        </thead>
        <tbody>
        @foreach($registros as $registro)

            @if($registro->servico)
                <tr class="text-success">
                    <th scope="row">{{ $registro->IdbalancoFinanceiro }}</th>
                    <td>+ R${{ $registro->Valor }}</td>
                    <td><a href="{{ route('servicos.detalhes', $registro->servico) }}">{{ $registro->servico->Tiposervico }}</a></td>
                </tr>
            @else
                <tr class="text-danger">
                    <th scope="row">{{ $registro->IdbalancoFinanceiro }}</th>
                    <td>- R${{ $registro->Valor }}</td>
                    <td><a href="{{ route('produtos.index', ['search' => $registro->Produto, 'atributoProduto' => 'Codigo']) }}">Compra de {{ $registro->produto->Nomeproduto }}</td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
@endsection
