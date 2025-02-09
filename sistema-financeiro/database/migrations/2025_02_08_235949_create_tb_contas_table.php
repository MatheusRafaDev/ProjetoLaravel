<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbContasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_contas', function (Blueprint $table) {
            $table->id('id_conta');
            $table->string('nome_conta', 100);
            $table->decimal('saldo', 15, 2)->default(0.00);
            $table->unsignedBigInteger('id_usuario');
            $table->timestamp('criado_em')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->foreign('id_usuario')->references('id_usuario')->on('tb_usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_contas');
    }
}