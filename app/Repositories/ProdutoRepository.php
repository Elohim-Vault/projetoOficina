<?php

namespace App\Repositories;
use App\Produto;

class ProdutoRepository
{
    private $model;

    public function __construct(Produto $model)
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
        return $this->model->paginate($quantidadePorPaginas);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function search($atributoProduto, $produto){
        return $this->model->where($atributoProduto, 'like', '%' .$produto. '%')->get();
    }

    public function missingProducts(){
        return $this->model->where('Quantidade', '<', 1)->get();
    }

    public function update($id, array $data)
    {
        return $this->model->find($id)->update($data);
    }

    public function delete($id){
        return $this->model->find($id)->delete();
    }

}
