<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ControllerSala extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salas = Sala::get()
        ->all();
        return view('admin.sala.index',['salas'=>$salas]);
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

        $sala = sala::where('sala','=',$request->sala)
        ->first();

        if($sala){
            return redirect()->route('salas.index')->with('status','existe');
        }

        $save = sala::create([
            'sala'=>$request->sala,
            'funcionario_id'=>$funcionario->id,

        ]);
        if($save){
            return redirect()->route('salas.index')->with('status','success');
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
        $update = sala::where('id','=',$id)->update([
            'sala'=>$request->sala,
        ]);
        if($update){
            return redirect()->route('salas.index')->with('status','success');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $hash = Auth::user()->password;
        if(password_verify($request->password, $hash)){
            if ($sala=sala::where('id',$id)) {
                $remove =  $sala->delete();
                return redirect()->route('salas.index')->with('status','success');
            }
        }
        return redirect()->route('salas.index')->with('status','error');

    }

    function recilagem(){
        $salas = sala::onlyTrashed()->get();
        return view('admin.sala.reciclagem',['salas'=>$salas]);
    }

    function restaurar(Request $request,$id){
        $hash = Auth::user()->password;
        if(password_verify($request->password, $hash)){
           $sala=sala::withTrashed()->findOrFail($id)->restore();
           return redirect()->route('salas.index')->with('status','success');
        }
        return redirect()->route('salas.index')->with('status','error');


    }
}
