<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CursoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'cursos'], function(){
    Route::post('', [CursoController::class,'store']);
    Route::get('', [CursoController::class, 'index']);
    Route::get('/{id}', [CursoController::class, 'show']);
    Route::put('/{id}', [CursoController::class, 'update']);
    Route::delete('/{id}', [CursoController::class, 'destroy']);
    Route::get('{id?}/alunos', [CursoController::class,'showAlunosCurso']);
});

Route::group(['prefix'=>'alunos'], function(){
    Route::post('', [AlunoController::class,'store']);
    Route::get('', [AlunoController::class, 'index']);
    Route::get('/{id}', [AlunoController::class,'show']);
    Route::put('/{id}', [AlunoController::class, 'update']);
    Route::delete('/{id}', [AlunoController::class, 'destroy']);
    Route::get('{id}/cursos', [AlunoController::class,'showCursosAluno']);
});
