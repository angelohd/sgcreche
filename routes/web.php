<?php

use App\Http\Controllers\ControllerAnoLectivo;
use App\Http\Controllers\ControllerFuncionario;
use App\Http\Controllers\ControllerSala;
use App\Http\Controllers\ControllerUtilizador;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {

    if(Auth::check()){
       return redirect()->route('logado');
    }else{
        return view('login.login');
    }
})->name('login');
Route::post('/iniciar/sessao',[ControllerUtilizador::class,'iniciar_sessao'])->name('iniciar_sessao');

Route::middleware('auth')->group(function(){
    Route::prefix('creche')->group(function(){

        Route::get('bem/vindo',[ControllerUtilizador::class,'index'])->name('logado');
        Route::post('terminar/sessao',[ControllerUtilizador::class,'terminar_sessao'])->name('terminar_sessao');

        Route::resource('ano_lectivos',ControllerAnoLectivo::class);
        Route::prefix('ano_lectivo')->name('ano_lectivo.')->group(function(){
                Route::get('recilagem',[ControllerAnoLectivo::class,'recilagem'])->name('recilagem');
                Route::post('restaurar/{id}',[ControllerAnoLectivo::class,'restaurar'])->name('restaurar');
        });

        Route::resource('salas',ControllerSala::class);
        Route::prefix('sala')->name('sala.')->group(function(){
                Route::get('recilagem',[ControllerSala::class,'recilagem'])->name('recilagem');
                Route::post('restaurar/{id}',[ControllerSala::class,'restaurar'])->name('restaurar');
        });

        Route::resource('funcionarios',ControllerFuncionario::class);
        Route::prefix('funcionario')->name('funcionario.')->group(function(){
                Route::get('recilagem',[ControllerFuncionario::class,'recilagem'])->name('recilagem');
                Route::post('restaurar/{id}',[ControllerFuncionario::class,'restaurar'])->name('restaurar');
        });

    });
});
