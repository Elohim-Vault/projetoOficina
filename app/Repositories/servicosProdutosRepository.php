<?php

namespace App\Repositories;
use App\produtoServico;

class servicosProdutosRepository
{
    private $model;

    public function __construct(produtoServico $model)
    {
        $this->model = $model;
    }

    public function findAll()
    {
        return $this->model->all();

    }

    public function find($idProduto, $idServico)
    {
        return $this->model
            ->where('IdProduto', $idProduto)
            ->where('IdServico', $idServico)
            ->get();
    }

    public function paginate(int $quantidadePorPaginas)
    {
        return $this->model->paginate($quantidadePorPaginas);
    }

    public function create(int $IdServico ,array $data)
    {
        $produtosInseridos = array();
        for($i=0; $i < count($data); $i++)
        {
            $codigo = array_keys($data)[$i];
            $quantidade = $data[$codigo];

            if($quantidade > 0){
                $dados = array(
                    'IdServico' => $IdServico,
                    'IdProduto' => $codigo,
                    'Quantidade' => intval($quantidade)
                );

                array_push($produtosInseridos, $this->model->create($dados));
            }
        }
        return $produtosInseridos;
    }

    public function update(array $data, $id)
    {
        return $this->model->find($id)->update($data);
    }

    public function delete($id){
        return $this->model->find($id)->delete();
    }

}
