<?php

namespace App\Repositories;
use App\Endereco;

class EnderecoRepository
{
    private $model;

    public function __construct(Endereco $model)
    {
        $this->model = $model;
    }

    public function findAll()
    {
        return $this->model->all();

    }

    public function find($id)
    {
        return $this->model->all();
    }

    public function paginate(int $quantidadePorPaginas)
    {
        return $this->model->paginate($quantidadePorPaginas);
    }

    public function create(array $data)
    {

        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {

        return $this->model->find($id)->update($data);

    }

    public function delete($id){
        return $this->model->find($id)->delete();
    }

}
