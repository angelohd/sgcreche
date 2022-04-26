<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Ano_Lectivo;
use App\Models\Encarregado;
use App\Models\Sala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerAluno extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alunos = Aluno::get();
        return view('admin.aluno.index',['alunos'=>$alunos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $salas = Sala::OrderBy('sala')->get();
        $ano_lectivos = Ano_Lectivo::get()->last();
        return view('admin.aluno.create',['salas'=>$salas,'ano_lectivos'=>$ano_lectivos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // save aluno
        $save_aluno = Aluno::create([
            'nome'=>$request->nome_aluno,
            'tipo_doc'=>$request->tipo_doc_aluno,
            'numero_doc'=>$request->numero_doc_aluno,
            'data_validade'=>$request->data_validade_aluno,
            'data_nasc'=>$request->data_nasc_aluno,
            'endereco'=>$request->endereco_aluno,
            'funcionario_id'=>Auth::user()->id
        ]);


        $save_encarregado_1 = Encarregado::create([
            'nome'=>$request->nome_encarregado_1,
            'tipo_doc'=>$request->tipo_doc_encarregado_1,
            'numero_doc'=>$request->numero_doc_encarregado_1,
            'data_validade'=>$request->data_validade_encarregado_1,
            'data_nasc'=>$request->data_nasc_encarregado_1,
            'endereco'=>$request->endereco_encarregado_1,
            'telefone1'=>$request->telefone_encarregado_1,
            'telefone2'=>$request->telefone2_encarregado_1,
            'email'=>$request->email_encarregado_1,
            'funcionario_id'=>Auth::user()->id
        ]);

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
