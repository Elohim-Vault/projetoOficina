<?php

namespace App\Repositories;
use App\balancoFinanceiro;
use App\produtoServico;
use App\Servico;
use Carbon\Traits\Date;

class BalancoFinanceiroRepository
{
    private $model;

    public function __construct(balancoFinanceiro $model)
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
        return $this->model->Paginate($quantidadePorPaginas);
    }

    public function newProfit(Servico $servico, float $valor)
    {
        $servicoProdutosRepository = new servicosProdutosRepository(new produtoServico());
        $total = $valor;
        foreach($servico->produtos as $key => $produto)
        {
            $produtoPivot = $servicoProdutosRepository->find($produto->Codigo, $servico->IdServico);
            $total += floatval($produto->Valor) * $produtoPivot[0]->quantidade;
        }

        return $this->model->create([
            'Valor' => $total,
            'Servico' => $servico->IdServico
        ]);
    }

    public function newLoss(array $data)
    {

    }

    public function sumYearly(){
        return $this->model->sum('Valor');
    }

    public function sumMontly(){


    }

    public function sumWeekly()
    {

    }

    public function update(array $data, $id)
    {
        return $this->model->find($id)->update($data);
    }

    public function delete($id){
        return $this->model->find($id)->delete();
    }

}
