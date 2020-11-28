@extends('header')
@section('conteudo')
    <table class="table table-bordered table-striped text-center">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Função</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($funcionarios as $funcionario)
            <tr>
                <th scope="row">{{ $funcionario->IdFuncionario }}</th>
                <td>{{ $funcionario->NomeFuncionario }}</td>
                <td>{{ $funcionario->Funcao }}</td>
                <td><a href="{{ route('funcionarios.detalhes', $funcionario) }}" class="btn btn-primary">Detalhes</a></td>
                <td><a href="{{ route('funcionarios.editar', $funcionario) }}" class="btn btn-warning">Editar</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    @if($funcionarios->previousPageUrl())
        <a href="{{ $servicos->previousPageUrl() }}"><i class="left-arrow" class="fas fa-angle-left"></i></a>
    @endif

    @if($funcionarios->nextPageUrl())
        <a href="{{ $servicos->nextPageUrl() }}"><i class="right-arrow" class="fas fa-angle-right"></i></a>
    @endif
@endsection
