<?php

namespace App\Http\Controllers;

use App\Models\Funcao;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class ControllerFuncionario extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funcionarios = Funcionario::join('funcaos','funcaos.id','funcao_id')
        ->select('funcionarios.*','funcaos.funcao')
        ->get();
       return view('admin.funcionario.index',['funcionarios'=>$funcionarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $funoes = Funcao::OrderBy('funcao')->get();
        return view('admin.funcionario.create',['funoes'=>$funoes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $funcionario_existe = Funcionario::where('numero_doc','=',$request->numero_doc)->first();
        if($funcionario_existe){
            return redirect()->route('funcionarios.index')->with('status','existe');
        }
        $funcionario = Funcionario::create($request->all());
        return redirect()->route('funcionarios.index')->with('status','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
