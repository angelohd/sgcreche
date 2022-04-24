<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncarregadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encarregados', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->enum('tipo_doc',['Passaporte','Bilhete de Identidade','Outro']);
            $table->string('numero_doc');
            $table->date('data_validade');
            $table->date('data_nasc');
            $table->text('endereco');
            $table->string('telefone1');
            $table->string('telefone2');
            $table->string('email');
            $table->foreignId('funcionario_id');
            $table->foreign('funcionario_id')->references('id')->on('funcionarios')->onDelete('cascade');
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
        Schema::dropIfExists('encarregados');
    }
}
