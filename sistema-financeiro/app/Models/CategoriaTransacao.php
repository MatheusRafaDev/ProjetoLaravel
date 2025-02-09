<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaTransacao extends Model
{
    use HasFactory;

    protected $table = 'tb_categorias_transacoes';
    protected $primaryKey = 'id_categoria';
    protected $fillable = ['nome_categoria', 'tipo'];

    public function movimentacoes()
    {
        return $this->hasMany(MovimentacaoFinanceira::class, 'id_categoria');
    }
}