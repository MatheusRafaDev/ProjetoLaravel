<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbTransferenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_transferencias', function (Blueprint $table) {
            $table->id('id_transferencia');
            $table->unsignedBigInteger('id_conta_origem');
            $table->unsignedBigInteger('id_conta_destino');
            $table->decimal('valor', 15, 2);
            $table->timestamp('data_transferencia')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->foreign('id_conta_origem')->references('id_conta')->on('tb_contas')->onDelete('cascade');
            $table->foreign('id_conta_destino')->references('id_conta')->on('tb_contas')->onDelete('cascade');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_transferencias');
    }
}