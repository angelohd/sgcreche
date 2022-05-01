<?php

namespace App\Http\Controllers;

use App\Mail\Email;
use App\Models\Funcao;
use App\Models\Funcionario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ControllerFuncionario extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funcionarios = Funcionario::join('funcaos', 'funcaos.id', 'funcao_id')
            ->select('funcionarios.*', 'funcaos.funcao')
            ->get();
        return view('admin.funcionario.index', ['funcionarios' => $funcionarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $funcoes = Funcao::OrderBy('funcao')->get();
        return view('admin.funcionario.create', ['funcoes' => $funcoes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $funcionario_existe = Funcionario::where('numero_doc', '=', $request->numero_doc)->first();
        if ($funcionario_existe) {
            return redirect()->route('funcionarios.index')->with('status', 'existe');
        }

        $funcionario = Funcionario::create($request->all());
        $funcionario_last = Funcionario::get()->last();

        $name = explode(" ", $request->nome);
        $nome = "@" . $name[0];

        $length = 10;
        $char = "0123456789qwertyuiopasdfghjklzxcvbnm[]\{}|<>,.?/";
        $chartamanho = strlen($char);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $char[rand(0, $chartamanho) - 1];
        }
        $codigo = $randomString;

        $user = User::create([
            'name'=>$nome,
            'email'=>$request->email,
            'password'=>Hash::make($codigo),
            'funcionario_id'=>$funcionario_last->id
        ]);

        Mail::to($request->email)->send(new Email($request->email,$codigo));

        return redirect()->route('funcionarios.index')->with('status', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $funcionario = Funcionario::join('funcaos', 'funcaos.id', 'funcao_id')
            ->where('funcionarios.id', '=', $id)
            ->select('funcionarios.*', 'funcaos.funcao as funcao')
            ->first();
        $show = "show";
        return view('admin.funcionario.show', ['funcionario' => $funcionario, 'show' => $show]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $funcoes = Funcao::OrderBy('funcao')->get();
        $funcionario = Funcionario::join('funcaos', 'funcaos.id', 'funcao_id')
            ->where('funcionarios.id', '=', $id)
            ->select('funcionarios.*')
            ->first();
        return view('admin.funcionario.edit', ['funcionario' => $funcionario, 'funcoes' => $funcoes]);
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
        $funcionario_update = Funcionario::where('id', '=', $id)->update([
            'nome' => $request->nome,
            'tipo_doc' => $request->tipo_doc,
            'numero_doc' => $request->numero_doc,
            'data_validade' => $request->data_validade,
            'endereco' => $request->endereco,
            'telefone1' => $request->telefone1,
            'telefone2' => $request->telefone2,
            'email' => $request->email,
            'funcao_id' => $request->funcao_id
        ]);
        return redirect()->route('funcionarios.index')->with('status', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (Auth::user()->id == $id) {
            return redirect()->route('funcionarios.index')->with('status', 'error');
        }
        $hash = Auth::user()->password;
        if (password_verify($request->password, $hash)) {
            if ($funcionario = Funcionario::where('id', $id)) {
                $remove = $funcionario->delete();
                return redirect()->route('funcionarios.index')->with('status', 'success');
            }
        }
        return redirect()->route('funcionarios.index')->with('status', 'error');
    }

    function recilagem()
    {
        $funcionarios = Funcionario::onlyTrashed()->get();
        return view('admin.funcionario.reciclagem', ['funcionarios' => $funcionarios]);
    }

    function restaurar(Request $request, $id)
    {
        $hash = Auth::user()->password;
        if (password_verify($request->password, $hash)) {
            $funcionario = Funcionario::withTrashed()->findOrFail($id)->restore();
            return redirect()->route('funcionarios.index')->with('status', 'success');
        }
        return redirect()->route('funcionarios.index')->with('status', 'error');
    }
}
