<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    use HasFactory;

    protected $table = 'tb_contas';
    protected $primaryKey = 'id_conta';
    protected $casts = ['data_abertura' => 'datetime',];

    
    protected $fillable = [
        'nome_conta', 
        'saldo', 
        'banco', 
        'numero_agencia', 
        'numero_conta', 
        'tipo_conta',
        'descricao', 
        'limite_credito', 
        'taxa_juros', 
        'status', 
    ];


    public function movimentacoes()
    {
        return $this->hasMany(MovimentacaoFinanceira::class, 'id_conta');
    }

    public function transferenciasOrigem()
    {
        return $this->hasMany(Transferencia::class, 'id_conta_origem');
    }

    public function transferenciasDestino()
    {
        return $this->hasMany(Transferencia::class, 'id_conta_destino');
    }
}