<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\servicoController;
use App\Http\Controllers\clienteController;

use App\Http\Controllers\HoleriteController;

use App\Http\Controllers\TelefoneController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CarroController;
use App\Http\Controllers\dashboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::middleware(['auth'])->group(function (){

    Route::middleware(['admin'])->group(function (){
        Route::get('/', [dashboardController::class, 'index'])->name('dashboard');

        // Funcionários
        Route::prefix('funcionarios')->group(function (){
            Route::get('', [FuncionarioController::class, 'index'])->name('funcionarios.index');
            Route::get('cadastro', [FuncionarioController::class, 'create'])->name('funcionarios.cadastro');
            Route::post('armazenar', [FuncionarioController::class, 'store'])->name('funcionarios.armazenar');
            Route::get('{funcionario}', [FuncionarioController::class, 'show'])->name('funcionarios.detalhes');
            Route::get('editar/{funcionario}', [FuncionarioController::class, 'edit'])->name('funcionarios.editar');
            Route::put('atualizar/{funcionario}', [FuncionarioController::class, 'update'])->name('funcionarios.atualizar');
        });

        // Holerite
        Route::prefix('holerite')->group(function (){
            Route::get('pagamentos', [HoleriteController::class, 'index'])->name('holerite.pagamentos');
            Route::get('pagamentos/edicao/{pagamento}', [HoleriteController::class, 'edit'])->name('holerite.editarPagamento');
            Route::get('pagamentos/computar', [HoleriteController::class, 'computarPagamento'])->name('holerite.computarPagamento');
            Route::put('pagamentos/atualizar/{pagamento}', [HoleriteController::class, 'update'])->name('holerite.atualizarPagamento');
        });
    });


    // Serviços
    Route::prefix('servicos')->group(function (){
        Route::get('', [servicoController::class, 'index'])->name('servicos.index');
        Route::get('cadastro', [servicoController::class, 'create'])->name('servicos.cadastro');
        Route::post('armazenar', [servicoController::class, 'store'])->name('servicos.armazenar');
        Route::get('{servico}', [servicoController::class, 'show'])->name('servicos.detalhes');
        Route::get('editar/{id}', [servicoController::class, 'edit'])->name('servicos.editar');
        Route::post('atualizar/{servico}', [servicoController::class, 'update'])->name('servicos.atualizar');
        Route::get('deletar/{id}', [servicoController::class, 'destroy'])->name('servicos.deletar');
        Route::get('concluir/{id}', [servicoController::class, 'done'])->name('servicos.concluir');
    });

    // Clientes
    Route::prefix('clientes')->group(function (){
        Route::get('', [clienteController::class, 'index'])->name('clientes.index');
        Route::get('/cadastro/fisico', [clienteController::class, 'createFisico'])->name('clientes.cadastroFisico');
        Route::get('/cadastro/juridico', [clienteController::class, 'createJuridico'])->name('clientes.cadastroJuridico');
        Route::post('/armazenar', [clienteController::class, 'store'])->name('clientes.armazenar');
        Route::delete('/deletar/{id}', [clienteController::class, 'destroy'])->name('clientes.deletar');
        Route::get('/{id}', [clienteController::class, 'show'])->name('clientes.detalhes');
        Route::get('/editar/{cliente}', [clienteController::class, 'edit'])->name('clientes.editar');
        Route::put('/atualizar/{cliente}', [clienteController::class, 'update'])->name('clientes.atualizar');
    });


    // Produtos
    Route::prefix('produtos')->group(function (){
        Route::get('', [ProdutoController::class, 'index'])->name('produtos.index');
        Route::get('cadastro', [ProdutoController::class, 'create'])->name('produtos.cadastro');
        Route::get('search', [ProdutoController::class, 'search'])->name('produtos.pesquisar');
        Route::post('armazenar', [ProdutoController::class, 'store'])->name('produtos.armazenar');
    });

    // Carros
    Route::prefix('carros')->group(function (){
        Route::get('cadastro/{cliente}', [CarroController::class, 'create'])->name('carros.cadastro');
        Route::post('armazenar', [CarroController::class, 'store'])->name('carros.armazenar');
        Route::get('deletar/{carro}', [CarroController::class, 'destroy'])->name('carros.deletar');
        Route::get('editar/{carro}', [CarroController::class, 'edit'])->name('carros.editar');
        Route::put('atualizar/{carro}', [CarroController::class, 'update'])->name('carros.atualizar');
    });

    // Telefones
    Route::prefix('telefones')->group(function (){
        Route::get('cadastro/{cliente}', [TelefoneController::class, 'create'])->name('telefones.cadastro');
        Route::post('armazenar', [TelefoneController::class, 'store'])->name('telefones.armazenar');
        Route::get('deletar/{telefone}', [TelefoneController::class, 'destroy'])->name('telefones.deletar');
        Route::get('editar/{telefone}', [TelefoneController::class, 'edit'])->name('telefones.editar');
        Route::put('atualizar/{telefone}', [TelefoneController::class, 'update'])->name('telefones.atualizar');
    });
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
