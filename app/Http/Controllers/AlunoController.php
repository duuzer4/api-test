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

    /* Resgata todos os alunos cadastrados */ public function index() 
    {
        return $this->aluno->paginate(10);
    }

    /* Cadastra os alunos com os dados:
    (
        curso_id,
        name,
        CPF,
        dataNascimento
    ) 
    */
    public function store(Request $request)
    {

        $dados = [
            'curso_id'=> $request->curso_id,
            'name' => $request->name,
            'CPF' => $request->CPF,
            'dataNascimento' => $request->dataNacimento
        ];

        $this->aluno->create($dados);
    }

    public function show($id, Request $request)
    {

        return $this->aluno->where('id', $id)->first();
    }

    public function update($id, Request $request)
    {
        $request -> validate([
            'curso_id' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'CPF' => ['required', 'string', 'max:255'],
            'dataNascimento' => ['required', 'date']
        ]);

        $this->aluno->where('id', $id)->update($request->all());
    }

    public function destroy($id)
    {
        $this->aluno->destroy($id);
    }

    public function showCursosAluno($id)
    {
        return $this->aluno->where('id', $id)->with('cursos')->get()->toArray();
    }
}
