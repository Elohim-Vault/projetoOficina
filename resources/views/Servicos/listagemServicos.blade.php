@extends('header')
@section('conteudo')

    @if(session('mensagemErro'))
        <div class="alert alert-danger" role="alert">
            {{ session('mensagemErro') }}
        </div>
    @endif
    @if(session('mensagemSucesso'))
        <div class="alert alert-success" role="alert">
            {{ session('mensagemSucesso') }}
        </div>
    @endif

        <table class="table table-striped table-bordered text-center" id="servicosTable">
{{--        <a href="{{ route('servicos.cadastro') }}" id="btnRegistro" class="btn btn-primary">Registrar um novo serviço</a>--}}
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Serviço</th>
            <th scope="col">Status</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($servicos as $servico)
        <tr>
            <th scope="row">{{ $servico->IdServico }}</th>
            <td>{{ $servico->Tiposervico }}</td>
            <td>{{ $servico->StatusServ }}</td>
            <td><a href="{{ route('servicos.detalhes', $servico) }}" class="btn btn-primary">Ver mais</a></td>
            @if($servico->StatusServ == 'Concluido')
                <td><a href="{{ url('servicos/concluir', $servico->IdServico )}}" class="btn btn-dark">Desfazer</a></td>
            @else
                <td><a href="{{ url('servicos/concluir', $servico->IdServico )}}" class="btn btn-success">Concluir</a></td>
            @endif
            <td><a href="{{ url('servicos/editar', $servico->IdServico )}}" class="btn btn-warning">Editar</a></td>
{{--            <td><a href="{{ url('servicos/deletar', $servico->IdServico )}}" class="btn btn-danger">Deletar</a></td>--}}
        </tr>
        @endforeach
        </tbody>
    </table>
    @if($servicos->previousPageUrl())
        <a href="{{ $servicos->previousPageUrl() }}"><i class="left-arrow" class="fas fa-angle-left"></i></a>
    @endif

    @if($servicos->nextPageUrl())
        <a href="{{ $servicos->nextPageUrl() }}"><i class="right-arrow" class="fas fa-angle-right"></i></a>
    @endif


@endsection
