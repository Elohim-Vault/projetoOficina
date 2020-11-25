@extends('header')
@section('conteudo')
    <a href="{{ route('holerite.computarPagamento') }}" class="btn btn-primary mb-3">Computar pagamentos</a>
    <table class="table table-bordered table-striped text-center">
        <thead>
        <tr>
            <th scope="col">Data de recebimento</th>
            <th scope="col">Funcionário</th>
            <th scope="col">Salário base</th>
            <th scope="col">Extra</th>
            <th>Salário total</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($pagamentos as $pagamento)
        <tr>
            <th scope="row">{{ date('m/Y', strtotime($pagamento->dataRecebimento)) }}</th>
            <td>{{ $pagamento->funcionario->NomeFuncionario }}</td>
            <td>R${{ $pagamento->salario }}</td>
            @if($pagamento->extra < 0)
                <td>- R${{ $pagamento->extra * - 1}}</td>
            @elseif($pagamento->extra > 0)
                <td>R${{$pagamento->extra}}</td>
            @else
                <td>R$0</td>
            @endif
            <td>R$ {{ $pagamento->salario + $pagamento->extra}}</td>
            <td><a href="{{ route('holerite.editarPagamento', $pagamento) }}" class="btn btn-warning">Editar</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
