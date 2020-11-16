<?php

namespace App\Repositories;
use App\servicosFuncionarios;

class ServicosFuncionariosRepository
{
    private $model;

    public function __construct($model)
    {
        $this->model = new servicosFuncionarios();
    }

    public function findAll()
    {
        return $this->model->all();

    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function paginate(int $quantidadePorPaginas)
    {
        return $this->model::orderBy('IdServico', 'DESC')->paginate($quantidadePorPaginas);
    }

    public function create(array $funcionarios, $idServico)
    {
        foreach($funcionarios as $idFuncionario){
            $this->model->create([
                'IdFuncionario' => $idFuncionario,
                'IdServico' => $idServico
            ]);
        }
    }

    public function update(int $id, array $data)
    {
        return $this->model->find($id)->update($data);
    }


    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }

}
