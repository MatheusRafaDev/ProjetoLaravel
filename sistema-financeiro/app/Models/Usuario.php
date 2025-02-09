<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'tb_usuarios';
    protected $primaryKey = 'id_usuario';
    protected $fillable = ['nome', 'email', 'senha', 'status'];

    protected $hidden = ['senha'];

    public function contas()
    {
        return $this->hasMany(Conta::class, 'id_usuario');
    }
}