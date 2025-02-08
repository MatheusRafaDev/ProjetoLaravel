<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // Define a tabela associada ao modelo, caso o nome da tabela não seja o plural do modelo
    protected $table = 'transactions'; // Se a tabela tiver outro nome

    // Define os campos que podem ser atribuídos em massa
    protected $fillable = [
        'type',       // Tipo de transação: 'receita' ou 'despesa'
        'category',   // Categoria da transação
        'amount',     // Valor da transação
        'description',// Descrição adicional (opcional)
        'date',       // Data da transação
    ];

    // Define os tipos de dados para os campos
    protected $casts = [
        'amount' => 'decimal:2',  // Certifica-se de que o valor é tratado como decimal com 2 casas
        'date' => 'date',         // Converte para o tipo de data
    ];
}
