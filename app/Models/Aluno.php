<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aluno extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = "alunos";
    protected $fillable= ['nome','tipo_doc','numero_doc','data_validade','data_nasc','endereco','funcionario_id'];
}
