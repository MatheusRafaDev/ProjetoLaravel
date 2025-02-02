<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;

    // Defina os atributos que podem ser preenchidos via inserção em massa
    protected $fillable = ['titulo', 'descricao', 'completa'];

    // Se você quiser, pode definir um tipo de dado específico para as colunas
    protected $casts = [
        'completa' => 'boolean',  // Exemplo de como garantir que 'completa' seja tratado como booleano
    ];

    // Caso não queira que os campos de data sejam preenchidos automaticamente (created_at e updated_at)
    // você pode desabilitar o timestamp
    public $timestamps = true;
}
