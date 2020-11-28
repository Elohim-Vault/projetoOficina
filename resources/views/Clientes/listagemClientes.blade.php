@extends('header')
@section('conteudo')
    <div id="errors">

    </div>

    <h3 class="text-center mb-4">Clientes fisicos</h3>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">CPF</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <tr>
        @foreach($clientes as $cliente)

            @if($cliente->Fisico)
                <tr>
                    <th scope="row">{{ $cliente->IdCliente }}</th>
                    <td>{{ $cliente->Nome }}</td>
                    <td class="" data-mask="000.000.000-00">{{ $cliente->Fisico->Cpf }}</td>
                    <td><a href="{{ route('clientes.detalhes', $cliente->IdCliente) }}" class="btn btn-primary">Ver
                            mais</a></td>
                    <td><a href="{{ route('clientes.editar', $cliente) }}" class="btn btn-warning">Editar</a></td>
                    <td>
                        <button class="btn btn-danger" id="btnDeletarCliente">Deletar</button>
                    </td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
    <h3 class="text-center mb-4">Clientes juridicos</h3>
    <table class="table table-bordered table-striped">
        <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome da empresa</th>
            <th scope="col">CNPJ</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($clientes as $cliente)
            @if($cliente->Juridico)
                <tr>
                    <th scope="row">{{ $cliente->IdCliente }}</th>
                    <td>{{ $cliente->Nome }}</td>
                    <td data-mask="00.000.000/0000-00">{{ $cliente->Juridico->CNPJ }}</td>
                    <td><a href="{{ route('clientes.detalhes', $cliente->IdCliente) }}" class="btn btn-primary">Ver
                            mais</a></td>
                    <td><a href="{{ route('clientes.editar', $cliente) }}" class="btn btn-warning">Editar</a></td>
                    <td>
                        <button class="btn btn-danger" id="btnDeletarCliente">Deletar</button>
                    </td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>

    @if($clientes->previousPageUrl())
        <a href="{{ $clientes->previousPageUrl() }}"><i class="left-arrow" class="fas fa-angle-left"></i></a>
    @endif

    @if($clientes->nextPageUrl())
        <a href="{{ $clientes->nextPageUrl() }}"><i class="right-arrow" class="fas fa-angle-right"></i></a>
    @endif
    <script>
        $(function () {
            $('button[id="btnDeletarCliente"]').click(function (event) {
                event.preventDefault();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('clientes.deletar', $cliente->IdCliente) }}",
                    type: "delete",
                    dataType: "json",
                    success: function (response) {
                        if (response.success === true) {
                            window.location.href = "{{ route('clientes.index') }}"
                        } else {
                            alert("DEU RUIM!");
                        }
                    }
                });
            });
        });
    </script>
@endsection
