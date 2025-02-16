<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbMovimentacoesFinanceirasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_movimentacoes_financeiras', function (Blueprint $table) {
            $table->id('id_movimentacao');
            $table->unsignedBigInteger('id_conta');
            $table->unsignedBigInteger('id_categoria');
            $table->string('descricao', 255);
            $table->decimal('valor', 15, 2);
            $table->string('tipo_movimentacao', 20); // 'entrada' ou 'saída'
            $table->date('data_movimentacao')->nullable(); 
            $table->timestamps();
            
            $table->foreign('id_conta')->references('id_conta')->on('tb_contas')->onDelete('cascade');
            $table->foreign('id_categoria')->references('id_categoria')->on('tb_categorias_transacoes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_movimentacoes_financeiras');
    }
}