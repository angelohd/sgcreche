<?php

namespace App\Http\Middleware;

use App\Models\Funcionario;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkfuncionario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $dados = Funcionario::where('id','=',Auth::user()->funcionario_id)->first();
        if($dados === null){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('login');
        }
        return $next($request);
    }
}
