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

    private $repository;

    public function __construct(){
        $this->repository = new ProdutoRepository(new Produto());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Produtos.listagemProdutos', [
            'produtos' => $this->repository->paginate(8)
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
        $produtoExiste = $this->repository->find($request->Codigo);

        if($produtoExiste){
            $balancoFinanceiro = new BalancoFinanceiroRepository(new balancoFinanceiro());

            $quantidade = $produtoExiste->Quantidade;
            $this->repository->update($request->Codigo, [
                'Valor' => $request->Valor,
                'Quantidade' => $quantidade + $request->Quantidade
            ]);

            $balancoFinanceiro->newLoss([
                'Valor' => $request->Valor * $request->Quantidade,
                'Produto' => $request->Codigo
            ]);
        }else{
            $this->repository->create($request->all());
        }

        return redirect()->route('produtos.index');
    }


    public function search(Request $request)
    {
        if($request->search != ''){
            $produtos = $this->repository->search($request->atributoProduto, $request->search);
        }else{
            $produtos = $this->repository->paginate(8);
        }

        return response()->json(['produtos' => $produtos]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Produto $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        return view('Produtos.editarProdutos', ['produto' => $produto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Produto $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Produto $produto, Request $request)
    {
        $this->repository->update($produto->Codigo, $request->all());
        return redirect()->route('produtos.index');
    }
}
