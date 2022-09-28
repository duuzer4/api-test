<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Curso;

class AlunoController extends Controller
{
    private $aluno;
    public function __construct(Aluno $aluno)
    {
        $this->aluno = $aluno;
    }

    public function index()
    {
        return $this->aluno->paginate(10);
    }

    public function store(Request $request)
    {

        $dados = [
            'name' => $request->name,
            'CPF' => $request->CPF,
            'dataNacimento' => $request->dataNacimento,
            'curso_id'=> $request->curso_id
        ];
        
        $this->aluno->create($dados);
    }

    public function show($id, Request $request)
    {

        $curso = Curso::where('id', $id)->with('alunos')->get()->toArray();

        dd($curso);

        $alunos = $this->aluno->where('curso_id', $id)->with('cursos')->get();


        foreach($alunos as $aluno)
        {
            echo "<p>ID: {$aluno->id}<br> Nome: {$aluno->name}<br> CPF: {$aluno->CPF}<br> Data de Nascimento: {$aluno->dataNascimento}<p>";
        }

    }

    public function update(Aluno $aluno, Request $request)
    {
        $aluno->update($request->all());

        return $aluno;
    }

    public function destroy($id)
    {
        //
    }
}
