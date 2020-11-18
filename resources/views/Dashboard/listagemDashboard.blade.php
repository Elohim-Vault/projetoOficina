@extends('header')
@section('conteudo')
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
                    <td>Eita</td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
@endsection
