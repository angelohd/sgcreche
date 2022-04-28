<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movimento_Aluno extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = "movimento__alunos";
    protected $fillable = ['aluno_id','funcionario_id'];
}
