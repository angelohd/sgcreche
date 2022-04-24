<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ano_Lectivo extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "ano_lectivos";
    protected $fillable = ['ano_lectivo','funcionario_id'];

}
