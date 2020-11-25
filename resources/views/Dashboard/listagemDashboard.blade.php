@extends('header')
@section('conteudo')
<div class="row" id="cards">
    <div class="card ml-3 mb-3 mr-3" style="width: 21rem;">
        <div class="card-body">
            <h5 class="card-title">Ganho anual</h5>
            @if($totalAnual - $salarioAnual > 0)
                <h3 class="text-center text-success font-weight-bold">R$ {{$totalAnual - $salarioAnual}}</h3>
            @elseif($totalAnual - $salarioAnual < 0)
                <h3 class="text-center text-danger font-weight-bold"> - R${{ ($totalAnual - $salarioAnual) * - 1}}</h3>
            @else
                <h3 class="text-center font-weight-bold">R${{$totalAnual}}</h3>
            @endif
        </div>
    </div>

    <div class="card mb-3 mr-3" style="width: 21rem;">
        <div class="card-body">
            <h5 class="card-title">Ganho mensal</h5>
            @if($totalMensal - $salarioMensal > 0)
                <h3 class="text-center text-success font-weight-bold">R$ {{$totalMensal - $salarioMensal}}</h3>
            @elseif($totalMensal - $salarioMensal < 0)
                <h3 class="text-center text-danger font-weight-bold"> - R${{ ($totalMensal - $salarioMensal) * - 1}} </h3>
            @else
                <h3 class="text-center font-weight-bold">R${{$totalMensal - $salarioMensal}}</h3>
            @endif
        </div>
    </div>

    <div class="card mb-3 mr-3" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Ganho diário</h5>
            @if($totalSemanal > 0)
                <h3 class="text-center text-success font-weight-bold">R$ {{$totalSemanal}}</h3>
            @elseif($totalSemanal < 0)
                <h3 class="text-center text-danger font-weight-bold"> - R${{$totalSemanal}}</h3>
            @else
                <h3 class="text-center font-weight-bold">R${{$totalSemanal}}</h3>
            @endif
        </div>
    </div>


    <div class="card mb-3 mr-3" style="width: 15rem;">
        <div class="card-body">
            <h5 class="card-title">Produtos em falta</h5>
            <h3 class="text-center font-weight-bold">{{ count($produtosEmFalta) }}</h3>
        </div>
    </div>

</div>
    <table class="table table-bordered table-striped ml-5">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Valor</th>
            <th scope="col">Justificativa</th>
        </tr>
        </thead>
        <tbody>
        <tr class="text-danger">
            <th scope="row">#</th>
            <td>- R${{ $salarioMensal }}</td>
            <td><a href="{{ route('holerite.pagamentos') }}">Pagamentos de salário</a></td>
        </tr>
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
                    <td>- R${{ $registro->Valor * - 1 }}</td>
                    <td>Compra de {{ $registro->produto->Nomeproduto }}</td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>


    @if($registros->previousPageUrl())
        <a class="left-arrow" href="{{ $registros->previousPageUrl() }}">
            <i class="fas fa-angle-left"></i>
        </a>
    @endif

    @if($registros->nextPageUrl())
        <a class="right-arrow" href="{{ $registros->nextPageUrl() }}">
            <i class="fas fa-angle-right"></i>
        </a>
    @endif
@endsection
