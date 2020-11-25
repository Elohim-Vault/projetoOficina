<?php

namespace App\Http\Controllers;

use App\Funcionario;
use App\Holerite;
use App\Repositories\FuncionarioRepository;
use App\Repositories\HoleriteRepository;
use Illuminate\Http\Request;

class HoleriteController extends Controller
{
    private $repository;
    public function __construct()
    {
        $this->repository = new HoleriteRepository(new Holerite());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('holerite.pagamentosFuncionarios', [
            'pagamentos' => $this->repository->findAll()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Holerite $pagamento)
    {
        return view('holerite.editarPagamento', [
           'pagamento' => $pagamento
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Holerite  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Holerite $pagamento)
    {
        $this->repository->update($request->all(), $pagamento->idHolerite);
        return redirect()->route('holerite.pagamentos');
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

    public function computarPagamento(){
        $funcionarioRepository = new FuncionarioRepository(new Funcionario());
        $funcionarios = $funcionarioRepository->findAll();

        $this->repository->computarPagamento($funcionarios);

    }


}
