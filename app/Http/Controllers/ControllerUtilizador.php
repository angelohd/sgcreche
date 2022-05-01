<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Ano_Lectivo;
use App\Models\Matricula;
use App\Models\Movimento_Aluno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerUtilizador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('layout.index');
        $numero_total_alunos = Aluno::get()->count();
        $ano_lectivo = Ano_Lectivo::get()->last();
        $alunos = Matricula::where('ano_lectivo_id',$ano_lectivo->id)->count();
        $presente = Movimento_Aluno::get()->count();
        // dd($presente);

        return view('admin.dashboard.index',['numero_total_alunos'=>$numero_total_alunos,'alunos'=>$alunos,'presente'=>$presente]);
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

    function iniciar_sessao(Request $request){

        if(filter_var($request->email,FILTER_VALIDATE_EMAIL)){
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
               return "success";
            }
            return "error";
        }
        return "error";
    }

    function terminar_sessao(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
