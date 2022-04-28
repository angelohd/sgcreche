<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Encarregado;
use App\Models\Encarregado_has_Aluno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerEncarregado extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $encarregados = Encarregado::get();
        return view('admin.encarregado.index',['encarregados'=>$encarregados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $encarregado = Encarregado::where('id','=',$id)->first();
       return view('admin.encarregado.form',['encarregado'=>$encarregado]);

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
        $update_encarregado = Encarregado::where('id','=',$id)->update([
            'nome'=>$request->nome,
            'tipo_doc'=>$request->tipo_doc,
            'numero_doc'=>$request->numero_doc,
            'data_validade'=>$request->data_validade,
            'endereco'=>$request->endereco,
            'telefone1'=>$request->telefone1,
            'telefone2'=>$request->telefone2,
            'email'=>$request->email
        ]);

        return redirect()->route('encarregados.index')->with('status','success');
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

    function listar_criancas(){
        $alunos = Aluno::get();
        return view('admin.encarregado.criancas',['alunos'=>$alunos]);
    }

    function agregar_encarregado($id){
        $crianca = Aluno::where('id','=',$id)->first();
        return view('admin.encarregado.agregar',['crianca'=>$crianca]);
    }

    function agregar(Request $request,$id){

        $existe_encarregado = Encarregado::where('numero_doc','=',$request->numero_doc)->first();
        if($existe_encarregado){
            $agregar = Encarregado_has_Aluno::create([
                'aluno_id'=>$id,
                'encarregado_id'=>$existe_encarregado->id
            ]);
            return redirect()->route('encarregado.listar_criancas')->with('status','success');
        }

        $update_encarregado = Encarregado::create([
            'nome'=>$request->nome,
            'tipo_doc'=>$request->tipo_doc,
            'numero_doc'=>$request->numero_doc,
            'data_validade'=>$request->data_validade,
            'endereco'=>$request->endereco,
            'telefone1'=>$request->telefone1,
            'telefone2'=>$request->telefone2,
            'email'=>$request->email,
            'funcionario_id'=>Auth::user()->id
        ]);

        $encarregado = Encarregado::get()->last();

        $agregar = Encarregado_has_Aluno::create([
            'aluno_id'=>$id,
            'encarregado_id'=>$encarregado->id
        ]);

        return redirect()->route('encarregado.listar_criancas')->with('status','success');
    }

    function buscar(Request $request){

        $encarregado = Encarregado::where('numero_doc','=',$request->numero_doc)->first();
        if($encarregado){
            return $encarregado;
        }

        // return ($request->numero_doc);
    }
}
