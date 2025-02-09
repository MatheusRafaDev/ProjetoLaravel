<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbUsuariosTable extends Migration
{
    public function up()
    {
        Schema::create('tb_usuarios', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('nome', 100);
            $table->string('email', 100)->unique();
            $table->string('senha', 255);
            $table->string('telefone', 15)->nullable();
            $table->string('endereco', 255)->nullable();
            $table->boolean('status')->default(true); // Ativo/Inativo
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_usuarios');
    }
}