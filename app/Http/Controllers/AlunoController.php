<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Models\Aluno;
use App\Models\Curso;

class AlunoController extends Controller
{
    private $aluno;
    public function __construct(Aluno $aluno)
    {
        $this->aluno = $aluno;
    }

    /* Busca todos os alunos cadastrados */ public function index() 
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
            'dataNascimento' => $request->dataNascimento
        ];

        $this->aluno->create($dados);
    }

    /* Busca um aluno especifico pelo ID */ 
    public function show($id, Request $request)
    {

        return $this->aluno->where('id', $id)->first();
    }

    /* Atualiza o cadastro de um aluno pelo ID */ 
    public function update($id, Request $request, Aluno $aluno)
    {
        Validator::make($request->all(), [
            'CPF' => [Rule::unique('alunos', 'CPF')->ignore($aluno), 
            'required', 'integer', 'max:255']
        ]);
        
        $this->aluno->where('id', $id)->update($request->all());        
    }

    /* Deleta o aluno pelo ID */
    public function destroy($id)
    {
        $this->aluno->destroy($id);
    }

    /* Busca todos os cursos do aluno pelo ID */
    public function showCursosAluno($id)
    {
        return $this->aluno->where('id', $id)->with('cursos')->get()->toArray();
    }
}
