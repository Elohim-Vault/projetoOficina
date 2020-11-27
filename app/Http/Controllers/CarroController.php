<?php

namespace App\Http\Controllers;

use App\Carro;
use App\Cliente;
use App\Repositories\CarroRepository;
use App\Repositories\ClienteRepository;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\TestFixture\C;

class CarroController extends Controller
{
    private $repository;
    public function __construct(){
        $this->repository = new CarroRepository(new Carro);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Cliente $cliente)
    {


        return view('Carros.cadastroCarros',[
            'cliente' => $cliente
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->model->create($request->all());
        return redirect()->route('clientes.detalhes', $request->Proprietario);
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


    public function edit(Carro $carro)
    {
        return view('Carros.editarCarros', [
            'carro' => $carro
        ]);
    }


    public function update(Request $request, Carro $carro)
    {
        $this->repository->update($request->all(), $carro->Idcarro);
        return redirect()->route('clientes.detalhes', $carro->proprietario->IdCliente);
    }

    public function destroy(Carro $carro)
    {
        $this->repository->delete($carro->Idcarro);
        return redirect()->back();
    }
}
