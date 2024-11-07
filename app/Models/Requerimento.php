<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requerimento extends Model
{
    use HasFactory;
    public function user()
    {
         return $this->belongTo(User::class, 'id');
    }
    //protected $fillable = ['tipo', 'descricao', 'user_id'];
}
