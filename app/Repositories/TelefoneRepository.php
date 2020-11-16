<?php

namespace App\Repositories;
use App\Telefone;

class TelefoneRepository
{
    private $model;

    public function __construct(Telefone $model)
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
        if(strlen($data['Numero']) == 9)
        {
            $tipo = 'Celular';
        }
        else
        {
            $tipo = 'Fixo';
        }

        return $this->model->create([
            'Tipo' => $tipo,
            'Numero' => $data['Numero'],
            'Cliente' => $data['Cliente']
        ]);
    }

    public function update(array $data, $id)
    {
        return $this->model->find($id)->update($data);
    }

    public function delete($id){
        return $this->model->find($id)->delete();
    }

}
