<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;

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

    public function store(Aluno $aluno, Request $request)
    {
        $this->aluno->create($request->all());
    }

    public function show($idAluno, Request $request)
    {
        $aluno = Aluno::where('id', $idAluno)->first();
        
        $curso = Curso::where('id', $aluno->curso_id)->get();

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
