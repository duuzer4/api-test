<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

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

    public function show(Curso $curso)
    {
        return $curso;
    }

    public function update(Curso $curso, Request $request)
    {
        $curso->update($request->all());

        return $curso;
    }

    public function destroy(Curso $curso)
    {
        return $curso->delete();
    }
}
