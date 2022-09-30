<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CursoController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/* Rotas para acessar as funções do controlador curso 

api/cursos -> get, busco todos os cursos
api/cursos -> post, crio um curso
api/cursos/{curso} -> get, busco um curso especifico
api/cursos/{curso}->put|patch, atualizo um curso especifico
api/cursos/{curso}->delete, deleto um curso especifico
api/curso/{id}/alunos->get, busco todos os alunos de um curso especifico  */

Route::group(['prefix'=>'cursos'], function(){
    Route::post('', [CursoController::class,'store']);
    Route::get('', [CursoController::class, 'index']);
    Route::get('/{id}', [CursoController::class, 'show']);
    Route::put('/{id}', [CursoController::class, 'update']);
    Route::delete('/{id}', [CursoController::class, 'destroy']);
    Route::get('{id?}/alunos', [CursoController::class,'showAlunosCurso']);
});


/* Rotas para acessar as funções do controlador aluno 

api/alunos->post , crio um aluno
api/alunos->get, busco todos os alunos
api/alunos{id}->get, busco um aluno especifico
api/alunos{id}->put, atualizo o cadastro de um aluno especifico
api/alunos{id}->delete, deleto um aluno especifico
api/alunos/{id}/curso->get, busco todos os cursos de um aluno especifico */

Route::group(['prefix'=>'alunos'], function(){
    Route::post('', [AlunoController::class,'store']);
    Route::get('', [AlunoController::class, 'index']);
    Route::get('/{id}', [AlunoController::class,'show']);
    Route::put('/{id}', [AlunoController::class, 'update']);
    Route::delete('/{id}', [AlunoController::class, 'destroy']);
    Route::get('{id}/cursos', [AlunoController::class,'showCursosAluno']);
});
