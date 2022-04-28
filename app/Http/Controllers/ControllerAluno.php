<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Ano_Lectivo;
use App\Models\Encarregado;
use App\Models\Encarregado_has_Aluno;
use App\Models\Matricula;
use App\Models\Movimento_Aluno;
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
        return view('admin.aluno.index', ['alunos' => $alunos]);
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
        return view('admin.aluno.create', ['salas' => $salas, 'ano_lectivos' => $ano_lectivos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd("aqui");

        $existe_aluno = Aluno::where('numero_doc', '=', $request->numero_doc_aluno)->first();

        if ($existe_aluno) {
            return redirect()->route('alunos.index')->with('status', 'existe');
        }

        // save aluno
        $save_aluno = Aluno::create([
            'nome' => $request->nome_aluno,
            'tipo_doc' => $request->tipo_doc_aluno,
            'numero_doc' => $request->numero_doc_aluno,
            'data_validade' => $request->data_validade_aluno,
            'data_nasc' => $request->data_nasc_aluno,
            'endereco' => $request->endereco_aluno,
            'funcionario_id' => Auth::user()->id
        ]);

        $aluno = Aluno::get()->last();

        $exiet_encarregado1 = Encarregado::where('numero_doc', '=', $request->numero_doc_encarregado_1)->first();

        if ($exiet_encarregado1) {
            $encarregado_has_aluno = Encarregado_has_Aluno::create([
                'aluno_id' => $aluno->id,
                'encarregado_id' =>  $exiet_encarregado1->id
            ]);
        } else {
            $save_encarregado_1 = Encarregado::create([
                'nome' => $request->nome_encarregado_1,
                'tipo_doc' => $request->tipo_doc_encarregado_1,
                'numero_doc' => $request->numero_doc_encarregado_1,
                'data_validade' => $request->data_validade_encarregado_1,
                'data_nasc' => $request->data_nasc_encarregado_1,
                'endereco' => $request->endereco_encarregado_1,
                'telefone1' => $request->telefone_encarregado_1,
                'telefone2' => $request->telefone2_encarregado_1,
                'email' => $request->email_encarregado_1,
                'funcionario_id' => Auth::user()->id
            ]);

            $last_encarregado_1 = Encarregado::get()->last();
            $encarregado_has_aluno = Encarregado_has_Aluno::create([
                'aluno_id' => $aluno->id,
                'encarregado_id' => $last_encarregado_1->id,
            ]);
        }
        if (isset($request->nome_encarregado_2)) {
            $exiet_encarregado2 = Encarregado::where('numero_doc', '=', $request->numero_doc_encarregado_2)->first();
            if ($exiet_encarregado2) {
                $encarregado_has_aluno = Encarregado_has_Aluno::create([
                    'aluno_id' => $aluno->id,
                    'encarregado_id' => $exiet_encarregado2->id
                ]);
            } else {
                $save_encarregado_2 = Encarregado::create([
                    'nome' => $request->nome_encarregado_2,
                    'tipo_doc' => $request->tipo_doc_encarregado_2,
                    'numero_doc' => $request->numero_doc_encarregado_2,
                    'data_validade' => $request->data_validade_encarregado_2,
                    'data_nasc' => $request->data_nasc_encarregado_2,
                    'endereco' => $request->endereco_encarregado_2,
                    'telefone1' => $request->telefone1_encarregado_2,
                    'telefone2' => $request->telefone2_encarregado_2,
                    'email' => $request->email_encarregado_2,
                    'funcionario_id' => Auth::user()->id
                ]);

                $last_encarregado_2 = Encarregado::get()->last();
                $encarregado_has_aluno = Encarregado_has_Aluno::create([
                    'aluno_id' => $aluno->id,
                    'encarregado_id' => $last_encarregado_2->id,
                ]);
            }
        }

        // matricula
        $ano_lectivo = Ano_Lectivo::get()->last();
        $matricula = Matricula::create([
            'aluno_id' => $aluno->id,
            'sala_id' => $request->sala_id,
            'ano_lectivo_id' => $ano_lectivo->id,
            'funcionario_id' => Auth::user()->id
        ]);

        return redirect()->route('alunos.index')->with('status', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aluno = Encarregado_has_Aluno::join('alunos', 'alunos.id', 'aluno_id')
            ->join('encarregados', 'encarregados.id', 'encarregado_id')
            ->where('alunos.id', '=', $id)
            ->select('alunos.*')
            ->first();
        $encarregado1 = Encarregado_has_Aluno::join('alunos', 'alunos.id', 'aluno_id')
            ->join('encarregados', 'encarregados.id', 'encarregado_id')
            ->where('alunos.id', '=', $id)
            ->select('encarregados.*')
            ->first();
        $encarregados = Encarregado_has_Aluno::join('alunos', 'alunos.id', 'aluno_id')
            ->join('encarregados', 'encarregados.id', 'encarregado_id')
            ->where('alunos.id', '=', $id)
            ->select('encarregados.*')
            ->count();
        if ($encarregados > 1) {

            $encarregado2 = Encarregado_has_Aluno::join('alunos', 'alunos.id', 'aluno_id')
                ->join('encarregados', 'encarregados.id', 'encarregado_id')
                ->where('alunos.id', '=', $id)
                ->select('encarregados.*')
                ->get()->last();
            // dd($encarregado2);
            return view('admin.aluno.show', ['aluno' => $aluno, 'encarregado1' => $encarregado1, 'encarregado2' => $encarregado2]);
        }


        return view('admin.aluno.show', ['aluno' => $aluno, 'encarregado1' => $encarregado1]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aluno = Aluno::where('id','=',$id)
        ->first();
        return view('admin.aluno.edit',['aluno'=>$aluno]);
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

        $update_aluno = Aluno::where('id','=',$id)->update([
            'nome'=>$request->nome,
            'tipo_doc'=>$request->tipo_doc,
            'numero_doc'=>$request->numero_doc,
            'data_validade'=>$request->data_validade,
            'data_nasc'=>$request->data_nasc,
            'endereco'=>$request->endereco
        ]);
        return redirect()->route('alunos.index')->with('status', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $hash = Auth::user()->password;
        if(password_verify($request->password, $hash)){
            if ($aluno=Aluno::where('id',$id)) {
                $remove = $aluno->delete();
                return redirect()->route('alunos.index')->with('status','success');
            }
        }
        return redirect()->route('alunos.index')->with('status','error');
    }

    function recilagem(){
        $alunos = Aluno::onlyTrashed()->get();
        return view('admin.aluno.reciclagem',['alunos'=>$alunos]);
    }

    function restaurar(Request $request,$id){
        $hash = Auth::user()->password;
        if(password_verify($request->password, $hash)){
           $aluno=Aluno::withTrashed()->findOrFail($id)->restore();
           return redirect()->route('alunos.index')->with('status','success');
        }
        return redirect()->route('alunos.index')->with('status','error');
    }

    function alunos(){
        $alunos = Aluno::get();
        return view('admin.movimento.index', ['alunos' => $alunos]);
    }

    function aluno_presnete($id){
        $aluno = Movimento_Aluno::where('aluno_id','=',$id)->first();
        if($aluno){
            return redirect()->route('aluno.alunos')->with('status','existe');
        }
        $entrada = Movimento_Aluno::create([
            'aluno_id'=>$id,
            'funcionario_id'=>Auth::user()->id
        ]);

        return redirect()->route('aluno.alunos')->with('status','success');
    }

    function alunos_presnetes(){
        $alunos = Movimento_Aluno::join('alunos','alunos.id','aluno_id')
        ->get();
        return view('admin.movimento.presentes', ['alunos' => $alunos]);
    }
}
