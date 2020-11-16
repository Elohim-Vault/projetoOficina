<?php

namespace App\Http\Controllers;

use App\ClienteFisico;
use App\ClienteJuridico;
use App\Endereco;
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
use Illuminate\Support\Facades\Http;

class clienteController extends Controller
{
    private $model;

    public function __construct(){
        $this->model = new ClienteRepository(new Cliente());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Clientes.listagemClientes', [
            'clientes' => $this->model->paginate(8)]
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


    public function createJuridico(){
        return view('Clientes.cadastroClientesJuridico');

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'nome' => 'required',
            'cpf' => 'required',
        ]);

        $bairro = new BairroRepository(new Bairro());
        $cidade = new CidadeRepository(new Cidade());
        $telefone = new TelefoneRepository(new Telefone());
        $endereco = new EnderecoRepository(new Endereco());


        $idCidade = $cidade->firstOrNew([
            'Cidade' => $request->input('cidade')
        ])->IdCidade;

        $idBairro = $bairro->firstOrNew([
            'Bairro' => $request->input('bairro')
        ])->IdBairro;


        $idEndereco = $endereco->create([
            'CEP' => $request->input('cep'),
            'Logradouro' => $request->input('logradouro'),
            'numero' => $request->input('numero'),
            'BairroID' => $idBairro,
            'CidadeID' => $idCidade,
        ])->IdEndereco;


        $idCliente = $this->model->create([
            'Nome' => $request->input('nome'),
            'IdEndereco' => $idEndereco
        ])->IdCliente;


        if($request->input('cnpj')){
            ClienteJuridico::create([
                'IdCliente' => $idCliente,
                'INS' => $request->input('ins'),
                'CNPJ' => $request->input('cnpj')
            ]);
        }else{
            ClienteFisico::create([
                'IdCliente' => $idCliente,
                'Cpf' => $request->input('cpf'),
                'Rg' => $request->input('rg')
            ]);
        }

        $telefone->create([
            'Numero' => $request->input('telefone'),
            'Cliente' => $idCliente
        ]);

        return response()->json([
            'success' => true
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('Clientes.detalhesClientes', [
            'cliente' => $this->model->find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $foiDeletado = $this->model->delete($id);
        return response()->json([
           'success' => true
        ]);
    }
}
