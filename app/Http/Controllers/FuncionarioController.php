<?php

namespace App\Http\Controllers;

use App\Bairro;
use App\Cidade;
use App\Endereco;
use App\Funcionario;
use App\Repositories\BairroRepository;
use App\Repositories\CidadeRepository;
use App\Repositories\EnderecoRepository;
use App\Repositories\salarioRepository;
use App\SalarioBase;
use Illuminate\Http\Request;
use App\Repositories\FuncionarioRepository;
class FuncionarioController extends Controller
{
    private $model;
    public function __construct(){
        $this->model = new FuncionarioRepository(new Funcionario());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Funcionarios.listagemFuncionarios', [
            'funcionarios' => $this->model->paginate(8)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Funcionarios.cadastroFuncionarios');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $endereco = new EnderecoRepository(new Endereco());
        $bairro = new BairroRepository(new Bairro());
        $cidade = new CidadeRepository(new Cidade());
        $salario = new salarioRepository(new SalarioBase());

        $idBairro = $bairro->firstOrNew([
           'Bairro' => $request->bairro
        ])->IdBairro;

        $idCidade = $cidade->firstOrNew([
            'Cidade' => $request->cidade
        ])->IdCidade;

        $idEndereco = $endereco->create([
            'CEP' => $request->cep,
            'Logradouro' => $request->logradouro,
            'BairroID' => $idBairro,
            'CidadeID' => $idCidade,
            'Numero' => $request->numero,
            'Complemento' => $request->complemento
        ])->IdEndereco;

        $idFuncionario = $this->model->create([
            'Cpf' => $request->input('cpf'),
            'RG' => $request->input('rg'),
            'NomeFuncionario' => $request->input('nome'),
            'Funcao' => $request->input('funcao'),
            'TurnoInicio' => $request->input('TurnoInicio'),
            'TurnoFim' => $request->input('TurnoFim'),
            'IdEndereco' => $idEndereco
        ])->IdFuncionario;

        $salario->create([
            'IdFuncionario' => $idFuncionario,
            'Salario' => $request->salario
        ]);

        return redirect(route('funcionarios.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  Funcionario $funcionario
     * @return \Illuminate\Http\Response
     */
    public function show(Funcionario $funcionario)
    {
        return view('funcionarios.detalhesFuncionarios', [
            'funcionario' => $funcionario
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
        //
    }
}
