<?php

namespace App\Http\Controllers;

use App\Models\Encarregado;
use Illuminate\Http\Request;

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
}
