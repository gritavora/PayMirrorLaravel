<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requerimento extends Model
{
    use HasFactory;

    // Relacionamento correto com a tabela User
    public function user()
    {
         return $this->belongsTo(User::class, 'user_id'); // Usando 'user_id' como chave estrangeira
    }

    // Campos que podem ser atribuídos em massa
    protected $fillable = ['tipo', 'descricao', 'user_id'];
}
