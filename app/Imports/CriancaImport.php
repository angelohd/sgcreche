<?php

namespace App\Imports;

use App\Models\Aluno;
use Maatwebsite\Excel\Concerns\ToModel;

class CriancaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $linha)
    {
        $a = Aluno::create([
            'nome' => $linha[0],
            'tipo_doc' => $linha[1],
            'numero_doc' => $linha[2],
            'data_validade' => $linha[3],
            'data_nasc' => $linha[4],
            'endereco' => $linha[5],
            'funcionario_id' => $linha[6]
        ]);
        return redirect()->route('alunos.index')->with('status', 'success');
    }
}
