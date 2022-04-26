<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Encarregado extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = "encarregados";
    protected $fillable =['nome','tipo_doc','numero_doc','data_validade','endereco','telefone1','telefone2','email','funcionario_id'];
}
