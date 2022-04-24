<?php

use App\Http\Controllers\ControllerAnoLectivo;
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
    });
});
