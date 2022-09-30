<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/* Modelo da tabela alunos */
class Aluno extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = 
    [
        'name', 
        'curso_id',
        'CPF', 
        'dataNascimento'
    ];

    public function cursos()
    {
        return $this->belongsTo(Curso::class, 'curso_id', 'id');
    }
}
