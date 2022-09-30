<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Aluno;

class CursoController extends Controller
{
    private $curso;

    public function __construct(Curso $curso)
    {
        $this->curso = $curso;
    }

    /* Busca todos os cursos cadastrado */
    public function index()
    {
        return $this->curso->paginate(10);
    }

    /* Cadastra um curso */
    public function store(Request $request)
    {
        $request -> validate([
            'name' => ['required', 'string', 'max:255']
        ]);

        $this->curso->create($request->all());
    }

    /* Busca um curso pelo ID */
    public function show($id)
    {
        return $this->curso->where('id', $id)->first();
    }

    /* Atualiza o cadastro de um curso pelo ID */
    public function update($id, Request $request)
    {
        $request -> validate([
            'name' => ['required', 'string', 'max:255']
        ]);
        $this->curso->where('id', $id)->update($request->all());
    }

    /* Deleta um curso pelo ID */
    public function destroy($id)
    {
        $this->curso->destroy($id);
    }

    /* Busca todos os alunos de um curso pelo ID */
    public function showAlunosCurso($id)
    {
        return $this->curso->where('id', $id)->with('alunos')->get()->toArray();
    }
}
