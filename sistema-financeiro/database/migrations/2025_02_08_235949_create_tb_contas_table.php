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
            $table->string('banco', 100)->nullable(); // Novo campo
            $table->string('numero_agencia', 50)->nullable(); // Novo campo
            $table->string('numero_conta', 50)->nullable(); // Novo campo
            $table->string('tipo_conta', 50); // Novo campo
            $table->text('descricao')->nullable(); // Novo campo
            $table->date('data_abertura')->nullable(); // Novo campo
            $table->decimal('limite_credito', 15, 2)->nullable(); // Novo campo
            $table->decimal('taxa_juros', 5, 2)->nullable(); // Novo campo
            $table->boolean('status')->default(true); // Novo campo
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
        Schema::dropIfExists('tb_contas');
    }
}