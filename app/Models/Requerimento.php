<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requerimento extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tipo',
        'descricao',
        'resposta',
        'status',
    ];

    // Relacionamento com o usuário (colaborador)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
