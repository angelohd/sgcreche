<?php

namespace Database\Seeders;

use App\Models\Ano_Lectivo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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

        $permission = Permission::create(['name' => 'list_crianca']);
        $permission = Permission::create(['name' => 'add_crianca']);
        $permission = Permission::create(['name' => 'edit_crianca']);
        $permission = Permission::create(['name' => 'view_crianca']);
        $permission = Permission::create(['name' => 'delete_crianca']);
        $permission = Permission::create(['name' => 'reciclagem_crianca']);
        $permission = Permission::create(['name' => 'restor_crianca']);

        $permission = Permission::create(['name' => 'list_funcionario']);
        $permission = Permission::create(['name' => 'add_funcionario']);
        $permission = Permission::create(['name' => 'edit_funcionario']);
        $permission = Permission::create(['name' => 'view_funcionario']);
        $permission = Permission::create(['name' => 'delete_funcionario']);
        $permission = Permission::create(['name' => 'reciclagem_funcionario']);
        $permission = Permission::create(['name' => 'restor_funcionario']);

        $permission = Permission::create(['name' => 'list_encarregado']);
        $permission = Permission::create(['name' => 'edit_encarregado']);
        $permission = Permission::create(['name' => 'agregar_encarregado']);

        $permission = Permission::create(['name' => 'list_ano_lectivo']);
        $permission = Permission::create(['name' => 'add_ano_lectivo']);
        $permission = Permission::create(['name' => 'edit_ano_lectivo']);
        $permission = Permission::create(['name' => 'delete_ano_lectivo']);
        $permission = Permission::create(['name' => 'reciclagem_ano_lectivo']);
        $permission = Permission::create(['name' => 'restor_ano_lectivo']);

        $permission = Permission::create(['name' => 'list_sala']);
        $permission = Permission::create(['name' => 'add_sala']);
        $permission = Permission::create(['name' => 'edit_sala']);
        $permission = Permission::create(['name' => 'delete_sala']);
        $permission = Permission::create(['name' => 'reciclagem_sala']);
        $permission = Permission::create(['name' => 'restor_sala']);

        $permission = Permission::create(['name' => 'entrada_crianca']);
        $permission = Permission::create(['name' => 'saida_crianca']);
        $permission = Permission::create(['name' => 'historico_crianca']);

        $role_admin = Role::create(['name' => 'Administrador']);
        $role_admin->givePermissionTo('list_crianca');
        $role_admin->givePermissionTo('add_crianca');
        $role_admin->givePermissionTo('edit_crianca');
        $role_admin->givePermissionTo('delete_crianca');
        $role_admin->givePermissionTo('reciclagem_crianca');
        $role_admin->givePermissionTo('view_crianca');
        $role_admin->givePermissionTo('restor_crianca');

        $role_admin->givePermissionTo('list_funcionario');
        $role_admin->givePermissionTo('add_funcionario');
        $role_admin->givePermissionTo('edit_funcionario');
        $role_admin->givePermissionTo('delete_funcionario');
        $role_admin->givePermissionTo('reciclagem_funcionario');
        $role_admin->givePermissionTo('view_funcionario');
        $role_admin->givePermissionTo('restor_funcionario');

        $role_admin->givePermissionTo('list_encarregado');
        $role_admin->givePermissionTo('edit_encarregado');
        $role_admin->givePermissionTo('agregar_encarregado');

        $role_admin->givePermissionTo('list_ano_lectivo');
        $role_admin->givePermissionTo('add_ano_lectivo');
        $role_admin->givePermissionTo('edit_ano_lectivo');
        $role_admin->givePermissionTo('delete_ano_lectivo');
        $role_admin->givePermissionTo('reciclagem_ano_lectivo');
        $role_admin->givePermissionTo('restor_ano_lectivo');

        $role_admin->givePermissionTo('list_sala');
        $role_admin->givePermissionTo('add_sala');
        $role_admin->givePermissionTo('edit_sala');
        $role_admin->givePermissionTo('delete_sala');
        $role_admin->givePermissionTo('reciclagem_sala');
        $role_admin->givePermissionTo('restor_sala');

        $role_admin->givePermissionTo('entrada_crianca');
        $role_admin->givePermissionTo('saida_crianca');
        $role_admin->givePermissionTo('historico_crianca');



        $save_funcao = Funcao::create([
            'funcao' => 'Administrador'
        ]);
        $save_funcao2 = Funcao::create([
            'funcao' => 'Gestor'
        ]);
        $save_funcao3 = Funcao::create([
            'funcao' => 'Recepcionista'
        ]);

        $save_funcionario = Funcionario::create([
            'nome' => 'Aministrador',
            'tipo_doc' => 'Bilhete de identidade',
            'numero_doc' => '1234567890',
            'data_validade' => '2022-10-10',
            'endereco' => 'zango 3',
            'telefone1' => '913746480',
            'telefone2' => '928058564',
            'email' => 'admin@sgcreche.com',
            'funcao_id' => 1
        ]);

        $save_user = User::create([
            'name' => '@administrador',
            'email' => 'admin@sgcreche.com',
            'password' => Hash::make('@angelo123'),
            'funcionario_id' => 1,
        ])->assignRole($role_admin);

        $ano_lectivo = Ano_Lectivo::create([
            'ano_lectivo' => '2021/2022',
            'funcionario_id' => 1
        ]);
    }
}
