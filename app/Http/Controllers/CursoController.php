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

    public function index()
    {
        return $this->curso->paginate(10);
    }

    public function store(Request $request)
    {
        $request -> validate([
            'name' => ['required', 'string', 'max:255']
        ]);

        $this->curso->create($request->all());
    }

    public function show($id)
    {
        return $this->curso->where('id', $id)->first();
    }

    public function update($id, Request $request)
    {
        $request -> validate([
            'name' => ['required', 'string', 'max:255']
        ]);
        $this->curso->where('id', $id)->update($request->all());
    }

    public function destroy($id)
    {
        $this->curso->destroy($id);
    }

    public function showAlunosCurso($id)
    {
        return $this->curso->where('id', $id)->with('alunos')->get()->toArray();
    }
}
