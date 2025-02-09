<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    use HasFactory;

    protected $table = 'tb_contas';
    protected $primaryKey = 'id_conta';
    protected $fillable = [
        'nome_conta', 
        'saldo', 
        'banco', 
        'numero_agencia', 
        'numero_conta', 
        'tipo_conta',
        'descricao', 
        'data_abertura', 
        'limite_credito', 
        'taxa_juros', 
        'status', 
        'id_usuario'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

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