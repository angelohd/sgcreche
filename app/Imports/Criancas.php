<?php

namespace App\Imports;

use App\Models\Aluno;
use App\Models\Funcao;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

// class Criancas implements ToModel
class Criancas implements ToCollection
{
    /**
     * @param Collection $collection
     */
    // public function model(array $collection)
    public function collection(Collection $collection)
    {


        foreach ($collection as $linha) {

           $array = array($linha);

           foreach($array as $row=>$key){
            echo $key[1 ];
           }
        //    echo "<br>";

            // $aluno = Aluno::create([
            //     'nome' => $alunos[0],
            //     'tipo_doc' => $alunos[1],
            //     'numero_doc' => $alunos[2],
            //     'data_validade' => $alunos[3],
            //     'data_nasc' => $alunos[4],
            //     'endereco' => $alunos[5],
            //     'funcionario_id' => $alunos[6]
            // ]);

        }
        return redirect()->route('alunos.index')->with('status', 'success');
    }
}
