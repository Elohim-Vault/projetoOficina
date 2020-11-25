<?php

namespace App\Repositories;
use App\Funcionario;
use App\Holerite;
use \Illuminate\Database\Eloquent\Collection;

class HoleriteRepository
{
    private $model;

    public function __construct(Holerite $model)
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

    public function update(array $data, $id)
    {
        return $this->model->find($id)->update($data);
    }

    public function delete($id){
        return $this->model->find($id)->delete();
    }

    public function computarPagamento(Collection $funcionarios){
        foreach ($funcionarios as $funcionario){
            try {
                $this->model->create([
                    'dataRecebimento' => date('Y-m-05'),
                    'idFuncionario' => $funcionario->IdFuncionario,
                    'salario' => $funcionario->salario,
                ]);
            }catch (\Exception $erro){
                continue;
            }
        }
    }


    public function somarPagamentosMensal(){
        $month = date('m');
        $year = date('Y');

        $salarioBruto = $this->model->whereRaw('MONTH(dataRecebimento) = '. $month)
            ->whereRaw('YEAR(dataRecebimento) = '. $year)
            ->sum('salario');

        $extra = $this->model->whereRaw('MONTH(dataRecebimento) = '. $month)
            ->whereRaw('YEAR(dataRecebimento) = '. $year)
            ->sum('extra');

        return $salarioBruto + $extra;
    }

    public function somarPagamentosAnual(){
        $year = date('Y');

        return $this->model->whereRaw('YEAR(dataRecebimento) = '. $year)->sum('salario');
    }
}
