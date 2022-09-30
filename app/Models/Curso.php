<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/* Modelo da tabela cursos */
class Curso extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable = ['name'];

    public function alunos()
    {
        return $this->hasmany(Aluno::class, 'curso_id', 'id');
    }
}
