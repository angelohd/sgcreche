<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use App\Models\Funcao;
use App\Models\Funcionario;

class myseedr extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $save_funcao = Funcao::create([
            'funcao'=>'Administrador'
        ]);
        $save_funcao2 = Funcao::create([
            'funcao'=>'Gestor'
        ]);
        $save_funcao3 = Funcao::create([
            'funcao'=>'Recepcionista'
        ]);

        $save_funcionario = Funcionario::create([
            'nome'=>'Aministrador',
            'tipo_doc'=>'Bilhete de identidade',
            'numero_doc'=>'1234567890',
            'data_validade'=>'2022-10-10',
            'endereco'=>'zango 3',
            'telefone1'=>'913746480',
            'telefone2'=>'928058564',
            'email'=>'admin@sgcreche.com',
            'funcao_id'=>1
        ]);

        $save_user = User::create([
            'name'=>'@administrador',
            'email'=>'admin@sgcreche.com',
            'password'=>Hash::make('@angelo123'),
            'funcionario_id'=>1,
        ]);
    }
}
