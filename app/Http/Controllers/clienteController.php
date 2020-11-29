<?php

namespace App\Http\Controllers;

use App\ClienteFisico;
use App\ClienteJuridico;
use App\Endereco;
use App\Utilities\FormataCampos;
use App\Telefone;
use App\Cliente;
use App\Bairro;
use App\Cidade;

use App\Repositories\BairroRepository;
use App\Repositories\CidadeRepository;
use App\Repositories\EnderecoRepository;
use App\Repositories\TelefoneRepository;
use App\Repositories\ClienteRepository;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;use Illuminate\Support\Facades\Validator;

class clienteController extends Controller
{
    private $repository;
    private $bairroRepository;
    private $cidadeRepository;
    private $telefoneRepository;
    private $enderecoRepository;

    public function __construct()
    {
        $this->repository = new ClienteRepository(new Cliente());
        $this->bairroRepository = new BairroRepository(new Bairro());
        $this->cidadeRepository = new CidadeRepository(new Cidade());
        $this->telefoneRepository = new TelefoneRepository(new Telefone());
        $this->enderecoRepository = new EnderecoRepository(new Endereco());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Clientes.listagemClientes', [
                'clientes' => $this->repository->paginate(8)]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createFisico()
    {
        return view('Clientes.cadastroClientesFisico');
    }


    public function createJuridico()
    {
        return view('Clientes.cadastroClientesJuridico');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'cpf' => 'sometimes|string|min:14',
            'rg' => 'sometimes|string|min:12',
            'cnpj' => 'sometimes|string|min:18',
            'ins' => 'sometimes|string|min:15',
            'cep' => 'string|min:9',
            'telefone' => 'string|min:8'
        ]);

        $idCidade = $this->cidadeRepository->firstOrNew([
            'Cidade' => $request->input('cidade')
        ])->IdCidade;

        $idBairro = $this->bairroRepository->firstOrNew([
            'Bairro' => $request->input('bairro')
        ])->IdBairro;


        $idEndereco = $this->enderecoRepository->create(FormataCampos::formataCampos([
            'CEP' => $request->input('cep'),
            'Logradouro' => $request->input('logradouro'),
            'numero' => $request->input('numero'),
            'BairroID' => $idBairro,
            'CidadeID' => $idCidade,
        ]))->IdEndereco;


        $idCliente = $this->repository->create(FormataCampos::formataCampos([
            'Nome' => $request->input('nome'),
            'IdEndereco' => $idEndereco
        ]))->IdCliente;


        if ($request->input('cnpj')) {
            ClienteJuridico::create(FormataCampos::formataCampos([
                'IdCliente' => $idCliente,
                'INS' => $request->input('ins'),
                'CNPJ' => $request->input('cnpj')
            ]));
        } else {
            ClienteFisico::create(FormataCampos::formataCampos([
                'IdCliente' => $idCliente,
                'Cpf' => $request->input('cpf'),
                'Rg' => $request->input('rg')
            ]));
        }

        $this->telefoneRepository->create(FormataCampos::formataCampos([
            'Numero' => $request->input('telefone'),
            'Cliente' => $idCliente
        ]));

        return response()->json([
            'success' => true
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('Clientes.detalhesClientes', [
            'cliente' => $this->repository->find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view('Clientes.editarCliente', [
            'cliente' => $cliente
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Cliente $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {

        $request->validate([
            'Cpf' => 'sometimes|string|min:14',
            'Rg' => 'sometimes|string|min:12',
            'CNPJ' => 'sometimes|string|min:14',
            'INS' => 'sometimes|string|min:9',
            'CEP' => 'string|min:9',
        ]);


        $dados = FormataCampos::formataCampos($request->all());

        $dados['CidadeID'] = $this->cidadeRepository->firstOrNew($request->all('Cidade'))->IdCidade;
        $dados['BairroID'] = $this->bairroRepository->firstOrNew($request->all('Bairro'))->IdBairro;

        $this->enderecoRepository->update($dados, $cliente->IdEndereco);
        $this->repository->update($cliente->IdCliente, $dados);


        if($cliente->fisico)
        {
            ClienteFisico::find($cliente->IdCliente, 'IdCliente')->update($dados);
        }else{
            ClienteJuridico::find($cliente->IdCliente, 'IdCliente')->update($dados);
        }

        return redirect()->route('clientes.detalhes', $cliente->IdCliente);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $foiDeletado = $this->repository->delete($id);
        return response()->json([
            'success' => true
        ]);
    }
}
