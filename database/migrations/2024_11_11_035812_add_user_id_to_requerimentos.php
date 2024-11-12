<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('requerimentos', function (Blueprint $table) {
        $table->unsignedBigInteger('user_id')->nullable(); // Adiciona a coluna user_id
        $table->foreign('user_id')->references('id')->on('users')->onDelete('set null'); // Relacionamento com a tabela users (ajuste conforme necessário)
    });
}

public function down()
{
    Schema::table('requerimentos', function (Blueprint $table) {
        $table->dropColumn('user_id'); // Remove a coluna caso a migração seja revertida
    });
}

};
