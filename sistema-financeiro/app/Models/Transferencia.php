<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transferencia extends Model
{
    use HasFactory;

    protected $table = 'tb_transferencias';
    protected $primaryKey = 'id_transferencia';
    protected $fillable = ['id_conta_origem', 'id_conta_destino', 'valor'];

    public function contaOrigem()
    {
        return $this->belongsTo(Conta::class, 'id_conta_origem');
    }

    public function contaDestino()
    {
        return $this->belongsTo(Conta::class, 'id_conta_destino');
    }
}