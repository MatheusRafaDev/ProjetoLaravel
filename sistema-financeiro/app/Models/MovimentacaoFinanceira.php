<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimentacaoFinanceira extends Model
{
    use HasFactory;

    protected $table = 'tb_movimentacoes_financeiras';
    protected $primaryKey = 'id_movimentacao';
    protected $fillable = ['id_conta', 'id_categoria', 'descricao', 'valor', 'tipo_movimentacao','data_movimentacao'];
    protected $dates = ['data_movimentacao'];


    public function conta()
    {
        return $this->belongsTo(Conta::class, 'id_conta');
    }

    public function categoria()
    {
        return $this->belongsTo(CategoriaTransacao::class, 'id_categoria');
    }
}