<?php

namespace App\Http\Controllers;

use App\balancoFinanceiro;
use App\Produto;
use App\Repositories\BalancoFinanceiroRepository;
use App\Repositories\ProdutoRepository;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class ProdutoController extends Controller
{

    private $model;

    public function __construct(){
        $this->model = new ProdutoRepository(new Produto());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Produtos.listagemProdutos', [
            'produtos' => $this->model->paginate(8)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Produtos.cadastroProdutos');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produtoExiste = $this->model->find($request->Codigo);

        if($produtoExiste){
            $balancoFinanceiro = new BalancoFinanceiroRepository(new balancoFinanceiro());

            $quantidade = $produtoExiste->Quantidade;
            $this->model->update($request->Codigo, [
                'Valor' => $request->Valor,
                'Quantidade' => $quantidade + $request->Quantidade
            ]);

            $balancoFinanceiro->newLoss([
                'Valor' => $request->Valor * $request->Quantidade,
                'Produto' => $request->Codigo
            ]);
        }else{
            $this->model->create($request->all());
        }

        return redirect()->route('produtos.index');
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

    public function search(Request $request)
    {
        if($request->search != ''){
            $produtos = $this->model->search($request->atributoProduto, $request->search);
        }else{
            $produtos = $this->model->paginate(8);
        }

        return response()->json(['produtos' => $produtos]);

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
    public function update($id, Request $request)
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
