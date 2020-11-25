<?php

namespace App\Http\Controllers;

use App\balancoFinanceiro;
use App\Holerite;
use App\Produto;
use App\Repositories\HoleriteRepository;
use App\Repositories\ProdutoRepository;
use Illuminate\Http\Request;
use App\Repositories\BalancoFinanceiroRepository;

class dashboardController extends Controller
{
    private $model;
    private $produto;

    public function __construct()
    {
        $this->model = new balancoFinanceiroRepository(new balancoFinanceiro());

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $holeriteRepository = new HoleriteRepository(new Holerite());
        $produtoRepository = new ProdutoRepository(new Produto());

        return view('Dashboard.listagemDashboard', [
            'registros' => $this->model->paginate(8),
            'totalAnual' => $this->model->sumYearly(),
            'totalMensal' => $this->model->sumMontly(),
            'totalSemanal' => $this->model->sumWeekly(),
            'produtosEmFalta' => $produtoRepository->missingProducts(),
            'salarioMensal' => $holeriteRepository->somarPagamentosMensal(),
            'salarioAnual' => $holeriteRepository->somarPagamentosAnual()
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
