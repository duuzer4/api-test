<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'CPF', 'dataNascimento'];

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id', 'id');
    }	
}
