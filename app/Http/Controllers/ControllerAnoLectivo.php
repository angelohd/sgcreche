<?php

namespace App\Http\Controllers;

use App\Models\Ano_Lectivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ControllerAnoLectivo extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ano_lectivos = Ano_Lectivo::get()
        ->all();
        return view('admin.ano_lectivo.index',['ano_lectivos'=>$ano_lectivos]);
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
        $funcionario = User::join('funcionarios','funcionarios.id','funcionario_id')
        ->where('users.id','=',Auth::user()->id)
        ->select('funcionarios.id as id')
        ->first();

        $save = Ano_Lectivo::create([
            'ano_lectivo'=>$request->ano_lectivo,
            'funcionario_id'=>$funcionario->id,

        ]);
        if($save){
            return redirect()->route('ano_lectivos.index')->with('status','success');
        }
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
        $update = Ano_Lectivo::where('id','=',$id)->update([
            'ano_lectivo'=>$request->ano_lectivo,
        ]);
        if($update){
            return redirect()->route('ano_lectivos.index')->with('status','success');
        }
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
