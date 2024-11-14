<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequerimentosTable extends Migration
{
    public function up()
    {
        Schema::create('requerimentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Colaborador que fez o requerimento
            $table->string('tipo');
            $table->text('descricao');
            $table->text('resposta_admin')->nullable();
            $table->enum('status', ['pendente', 'respondido', 'finalizado'])->default('pendente');
            $table->timestamps();

            // Relacionamento
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('requerimentos');
    }
}
