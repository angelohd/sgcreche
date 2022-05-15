<?php

namespace Database\Seeders;

use App\Models\Aluno;
use App\Models\Ano_Lectivo;
use App\Models\Encarregado;
use App\Models\Encarregado_has_Aluno;
use App\Models\Matricula;
use App\Models\Sala;
use Illuminate\Database\Seeder;

class InsetCrianca extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 0;

        while ($i < 200) {

            $criancas = Aluno::create([
                'nome' => 'Crinaça' . $i,
                'tipo_doc' => 'Bilhete de Identidade',
                'numero_doc' => '123' . $i,
                'data_validade' => date('Y-m-d'),
                'data_nasc' => '2022-03-20',
                'endereco' => 'Benfica',
                'funcionario_id' => '1'
            ]);

            $crianca = Aluno::get()->last();

            $biencarregado = array('0056097457MO069', '4545677676747567', '76477667567657', '4746756756756756', '567567567578567', '567567567675', '567567676', '5675675676', '56756756765', '56756756778768', '56756757857858', '785876878', '857887875', '56878758568', '76878768758', '7688574677', '56756765767', '567567675675', '56756765767', '567567567565746', '675675676577765', '5677588786857', '65756757856785676', '567567857898567', '35345435345', '456456465');
            $bi = array_rand($biencarregado, 1);
            // dd($biencarregado[$bi]);

            $encarregado = Encarregado::where('numero_doc', '=', $biencarregado[$bi])->first();

            if ($encarregado === null) {

                $encarregados = Encarregado::create([
                    'nome' => 'Pai' . $i,
                    'tipo_doc' => 'Bilhete de Identidade',
                    'numero_doc' => $biencarregado[$bi],
                    'data_validade' => date('Y-m-d'),
                    'endereco' => 'Benfica',
                    'telefone1' => '+244928058564',
                    'telefone2' => '+244913746480',
                    'email' => 'pai' . $i . '@gmail.com',
                    'funcionario_id' => '1'
                ]);

                $encarregado = Encarregado::get()->last();

                $dd_encarregado = Encarregado_has_Aluno::create([
                    'aluno_id' => $crianca->id,
                    'encarregado_id' => $encarregado->id
                ]);

            }else{

                $dd_encarregado = Encarregado_has_Aluno::create([
                    'aluno_id' => $crianca->id,
                    'encarregado_id' => $encarregado->id
                ]);

            }

            $ano_lectivo = Ano_Lectivo::get()->last();

            $sala = Sala::inRandomOrder()->first();

            $matricula = Matricula::create([
                'aluno_id' => $crianca->id,
                'sala_id' => $sala->id,
                'ano_lectivo_id' => $ano_lectivo->id,
                'funcionario_id' => '1'
            ]);

            $i++;
        }
    }
}
