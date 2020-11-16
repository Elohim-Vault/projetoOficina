@extends('header')
@section('conteudo')
    <div id="errors">

    </div>
    <table class="table table-bordered table text-center" id="clientesTable">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">CPF</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($clientes as $cliente)
        <tr>
            <th scope="row">{{ $cliente->IdCliente }}</th>
            <td>{{ $cliente->Nome }}</td>
            <td>{{ $cliente->Cpf }}</td>
            <td><a href="{{ route('clientes.detalhes', $cliente->IdCliente) }}" class="btn btn-primary">Ver mais</a> </td>
            <td><a href="" class="btn btn-warning">Editar</a></td>
            <td><button class="btn btn-danger" id="btnDeletarCliente">Deletar</button></td>
        </tr>
        @endforeach
        </tbody>
    </table>

    @if($clientes->previousPageUrl())
        <a href="{{ $servicos->previousPageUrl() }}"><i class="left-arrow" class="fas fa-angle-left"></i></a>
    @endif

    @if($clientes->nextPageUrl())
        <a href="{{ $servicos->nextPageUrl() }}"><i class="right-arrow" class="fas fa-angle-right"></i></a>
    @endif

    <script>
        $(function() {
            $('button[id="btnDeletarCliente"]').click(function (event) {
                event.preventDefault();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('clientes.deletar', $cliente->IdCliente) }}",
                    type: "delete",
                    dataType: "json",
                    success: function (response){
                        if(response.success === true){
                            window.location.href = "{{ route('clientes.index') }}"
                        }else{
                            alert("DEU RUIM!");
                        }
                    }
                    });
            });
        });
    </script>
@endsection
