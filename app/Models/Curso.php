<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function aluno()
    {
        return $this->hasmany(Aluno::class, 'curso_id', 'id');
    }
}
