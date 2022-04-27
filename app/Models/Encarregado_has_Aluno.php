<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Encarregado_has_Aluno extends Model
{
    use HasFactory;

    protected $table = "encarregado_has__alunos";
    protected $fillable = ['aluno_id','encarregado_id'];
}
