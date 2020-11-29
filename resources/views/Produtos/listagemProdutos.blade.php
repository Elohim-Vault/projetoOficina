@extends('header')
@section('conteudo')
    <table class="table table-bordered text-center table-md" id="produtosTable">
        <form>
            <div class="form-row align-items-center">
                <div class="col-auto">
                    <input type="text" class="form-control mb-2 button" id="search" name="search" placeholder="Digite aqui...">
                </div>
                <div class="col-auto">
                    <select class="custom-select mb-2" id="atributoProduto" name="atributoProduto">
                        <option value="Codigo" selected>Código</option>
                        <option value="Nomeproduto">Nome</option>
                        <option value="Tipoproduto">Tipo</option>
                        <option value="Marcaproduto">Marca</option>
                    </select>
                </div>
            </div>
        </form>

        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Produto</th>
            <th scope="col">Tipo</th>
            <th scope="col">Marca</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Custo unitario</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($produtos as $produto)
        <tr>
            <th scope="row">{{ $produto->Codigo }}</th>
            <td>{{ $produto->Nomeproduto }}</td>
            <td>{{ $produto->Tipoproduto }}</td>
            <td>{{ $produto->Marcaproduto }}</td>
            <td>{{ $produto->Quantidade }}</td>
            <td>{{ $produto->Valor }}</td>
            <td><a href="{{ route('produtos.editar', $produto) }}" class="btn btn-warning">Editar</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>

    @if($produtos->previousPageUrl())
        <a href="{{ $servicos->previousPageUrl() }}"><i class="left-arrow" class="fas fa-angle-left"></i></a>
    @endif

    @if($produtos->nextPageUrl())
        <a href="{{ $servicos->nextPageUrl() }}"><i class="right-arrow" class="fas fa-angle-right"></i></a>
    @endif

    <script>
        $('#search').on('keyup', function (){
           $value=$(this).val();
           $atributoProduto = $('#atributoProduto option:selected').val();

           $.ajax({
               headers: { 'csrftoken' : '{{ csrf_token() }}' },
               type: 'get',
               url: '{{ route('produtos.pesquisar') }}',
               dataType: 'json',
               data: { 'search': $value, 'atributoProduto': $atributoProduto},
               success: function (response){
                   $tbody = $('#produtosTable tbody');
                   $tbody.html(' ');
                   if(response.produtos.data){
                       $objetoProcura = response.produtos.data;
                       console.log(response.produtos.data[0]['Codigo']);
                   }else{
                       $objetoProcura = response.produtos
                       console.log(response.produtos);
                   }

                   $.each($objetoProcura, function (index){
                       $tbody.append('<tr class="table-striped">')
                       $tbody.append('<th class="scope">'+ $objetoProcura[index]['Codigo'] +'</th>')
                       $tbody.append('<td>'+ $objetoProcura[index]['Nomeproduto'] +'</td>')
                       $tbody.append('<td>'+ $objetoProcura[index]['Tipoproduto'] +'</td>')
                       $tbody.append('<td>'+ $objetoProcura[index]['Marcaproduto'] +'</td>')
                       $tbody.append('<td>'+ $objetoProcura[index]['Quantidade'] +'</td>')
                       $tbody.append('<td>'+ $objetoProcura[index]['Valor'] +'</td>')
                       $tbody.append('</tr>')
                   });

               }
           })
        });
    </script>
@endsection
