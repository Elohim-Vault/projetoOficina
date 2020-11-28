<?php

namespace App\Http\Controllers;

use App\Bairro;
use App\Cidade;
use App\Endereco;
use App\Funcionario;
use App\Http\Controllers\Auth\RegisterController;
use App\Repositories\BairroRepository;
use App\Repositories\CidadeRepository;
use App\Repositories\EnderecoRepository;
use App\Repositories\salarioRepository;
use App\SalarioBase;
use App\Utilities\FormataCampos;
use Illuminate\Http\Request;
use App\Repositories\FuncionarioRepository;
use Illuminate\Support\Facades\Auth;

class FuncionarioController extends Controller
{
    private $repository;
    private $enderecoRepository;
    private $bairroRepository;
    private $cidadeRepository;

    public function __construct(){
        $this->repository = new FuncionarioRepository(new Funcionario());
        $this->enderecoRepository = new EnderecoRepository(new Endereco());
        $this->bairroRepository = new BairroRepository(new Bairro());
        $this->cidadeRepository = new CidadeRepository(new Cidade());

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Funcionarios.listagemFuncionarios', [
            'funcionarios' => $this->repository->paginate(8)
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
        $registerController = new RegisterController();

        $idBairro = $this->bairroRepository->firstOrNew([
           'Bairro' => $request->bairro
        ])->IdBairro;

        $idCidade = $this->cidadeRepository->firstOrNew([
            'Cidade' => $request->cidade
        ])->IdCidade;

        $idEndereco = $this->enderecoRepository->create(FormataCampos::formataCampos([
            'CEP' => $request->cep,
            'Logradouro' => $request->logradouro,
            'BairroID' => $idBairro,
            'CidadeID' => $idCidade,
            'numero' => $request->numero,
            'Complemento' => $request->complemento
        ]))->IdEndereco;

        $idFuncionario = $this->repository->create(FormataCampos::formataCampos([
            'Cpf' => $request->input('cpf'),
            'RG' => $request->input('rg'),
            'NomeFuncionario' => $request->input('nome'),
            'Funcao' => $request->input('funcao'),
            'TurnoInicio' => $request->input('TurnoInicio'),
            'TurnoFim' => $request->input('TurnoFim'),
            'salario' => $request->salario,
            'IdEndereco' => $idEndereco,
        ]))->IdFuncionario;



        $registerController->create([
            'email' => $request->email,
           'IdFuncionario' => $idFuncionario,
           'password' => $request->senha
        ]);

        return redirect(route('funcionarios.index'));

    }

    public function criaUsuario($data){

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
     * @param  Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function edit(Funcionario $funcionario)
    {
        return view('Funcionarios.editarFuncionario', [
            'funcionario' => $funcionario
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Funcionario $funcionario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Funcionario $funcionario)
    {
        $idBairro = $this->bairroRepository->firstOrNew([
            'Bairro' => $request->bairro
        ])->IdBairro;

        $idCidade = $this->cidadeRepository->firstOrNew([
            'Cidade' => $request->cidade
        ])->IdCidade;

        $this->enderecoRepository->update(FormataCampos::formataCampos([
            'CEP' => $request->cep,
            'Logradouro' => $request->logradouro,
            'BairroID' => $idBairro,
            'CidadeID' => $idCidade,
            'numero' => $request->numero,
            'Complemento' => $request->complemento
        ]), $funcionario->IdEndereco);

        $this->repository->update(FormataCampos::formataCampos([
            'Cpf' => $request->input('cpf'),
            'RG' => $request->input('rg'),
            'NomeFuncionario' => $request->input('nome'),
            'Funcao' => $request->input('funcao'),
            'TurnoInicio' => $request->input('TurnoInicio'),
            'TurnoFim' => $request->input('TurnoFim'),
            'salario' => $request->salario,
            'IdEndereco' => $funcionario->IdEndereco,
        ]), $funcionario->IdFuncionario);

        return redirect()->route('funcionarios.index');

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
