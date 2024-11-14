<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToRequerimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requerimentos', function (Blueprint $table) {
            $table->string('status')->default('pendente'); // Adiciona a coluna status com valor padrão 'pendente'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('requerimentos', function (Blueprint $table) {
            $table->dropColumn('status'); // Remove a coluna status
        });
    }
}
