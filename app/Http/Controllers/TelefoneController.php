<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Repositories\TelefoneRepository;
use App\Telefone;
use Illuminate\Http\Request;

class TelefoneController extends Controller
{
    private $repository;

    public function __construct(){
        $this->repository = new TelefoneRepository(new Telefone());
    }

    public function create(Cliente $cliente)
    {

        return view('Telefones.cadastroTelefones', [
            'cliente' => $cliente->IdCliente
        ]);
    }

    public function store(Request $request)
    {

        $this->repository->create([
            'Numero' => $request->numero,
            'Cliente' => $request->id
        ]);

        return redirect()->route('clientes.detalhes', $request->id);
    }

    public function destroy(Telefone $telefone){
         $this->repository->delete($telefone->TelID);
         return redirect()->back();
    }

    public function edit(Telefone $telefone){
        return view('Telefones.editarTelefone', [
            'telefone' => $telefone
        ]);
    }

    public function update(Request $request, Telefone $telefone){
        $this->repository->update($request->all(), $telefone->TelID);
        return redirect()->route('clientes.detalhes', $telefone->cliente->IdCliente);
    }
}
