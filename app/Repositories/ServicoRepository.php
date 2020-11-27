<?php

namespace App\Repositories;
use App\Servico;

class ServicoRepository
{
    private $model;

    public function __construct(Servico $model)
    {
        $this->model = $model;
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
        return $this->model::orderBy('StatusServ', 'DESC')->paginate($quantidadePorPaginas);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->model->find($id)->update($data);
    }

    public function done($id)
    {
        $servico = $this->model->find($id);
        if($servico->StatusServ == 'Em andamento')
        {
            $this->model->find($id)->update(['StatusServ' => 'Concluido']);
        }
        else
        {
            $this->model->find($id)->update(['StatusServ' => 'Em andamento']);
        }
    }

    public function delete($id){
        return $this->model->find($id)->delete();
    }

}
