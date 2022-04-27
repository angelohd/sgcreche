<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Matricula extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = "matriculas";
    protected $fillable = ['aluno_id','sala_id','ano_lectivo_id','funcionario_id'];
}
