{{--{{ dd($servico) }}--}}
<style>
    .titulo{
        text-align: center;
        border-bottom: 1px solid black;
    }

    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        text-align: center;
    }
</style>

<h1 class="titulo">ORÇAMENTO</h1>

<h4>CLIENTE: {{ $cliente }}</h4>
<h4>TELEFONE: (11) 2696-6501</h4>
<h4>ENDERECO: Rua Cardoso de Almeida, 423 - Sumaré, São Paulo</h4>
<h4>DATA: {{ date('d/m/Y', strtotime($servico['DataChegada']))}}</h4>



<h4>TIPO DO SERVIÇO: {{ $servico['Tiposervico'] }}</h4>
<h4>DATA DE SAIDA PREVISTA: {{ date('d/m/Y h:m:s', strtotime($servico['PrevisãoSaida'])) }}</h4>
<h4>TOTAL: R${{ $servico['valor'] + $somaProdutos }}</h4>


@if($servico['produtos'])
    <table style="width:100%">
        <tr>
            <th>Código do produto</th>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Valor unitario</th>
        </tr>
        @foreach($produtos as $produto)
            <tr>
                <td>{{ $produto->get('Codigo') }}</td>
                <td>{{ $produto->get('Nomeproduto') }}</td>
                <td>{{ $produto->get('quantidadeUsada') }}</td>
                <td>R${{ $produto->get('Valor') }}</td>
            </tr>
        @endforeach
    </table>
@endif

