<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimentoAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimento__alunos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aluno_id');
            $table->foreignId('funcionario_id');
            $table->foreignId('encarregado_id')->nullable();
            // $table->timestamp('data_movimento');
            // $table->enum('movimento',['Entrada','Saida']);
            $table->foreign('aluno_id')->references('id')->on('alunos')->onDelete('cascade');
            $table->foreign('funcionario_id')->references('id')->on('funcionarios')->onDelete('cascade');
            $table->foreign('encarregado_id')->references('id')->on('encarregados')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimento__alunos');
    }
}
