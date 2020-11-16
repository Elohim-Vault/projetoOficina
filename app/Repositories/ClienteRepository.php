<?php

namespace App\Repositories;
use App\Cliente;
use App\ClienteFisico;
use App\ClienteJuridico;

class ClienteRepository
{
    private $model;

    public function __construct(Cliente $model)
    {
        $this->model = $model;
    }

    public function findAll()
    {
        return $this->model->all();
    }


    public function paginate($numeroPorPaginas)
    {
        return $this->model->paginate($numeroPorPaginas);
    }
    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {

        return $this->model->create($data);

    }

    public function update(array $data, $id)
    {
        return $this->model->find($id)->update($data);
    }

    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }


}
