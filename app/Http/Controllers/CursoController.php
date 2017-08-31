<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;

class CursoController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $cursos = Curso::all();
		if (is_null($cursos))
			return redirect()->route("index")->withErrors('Erro ao carregar a base de dados!');
        else
            return view("cursos.index", compact('cursos'));
    }

    //Show the form for creating a new resource.
    public function create()
    {
        return view("cursos.create");
    }

    //Store a newly created resource in storage.
    public function store(Request $request)
    {
        $curso = Curso::create($request->all());
		if(is_null($curso))
			return redirect()->route('curso.index')->withErrors('Erro ao carregar o curso!');
        else
            return redirect()->route('curso.index')->with('Curso inserido com sucesso!');
    }

    //Display the specified resource.
    public function show($id)
    {
        //
    }

    //Show the form for editing the specified resource.
    public function edit($id)
    {
        $curso = Curso::findOrFail($id);
		if (is_null($curso))
			return redirect()->route('curso.index')->withErrors('Erro ao carregar o curso!');
		else 
            return view('cursos.edit', compact('curso'));
    }

    //Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $curso = Curso::findOrFail($id);
		if (is_null($curso)) 
			return redirect()->route('curso.index')->withErrors('Erro ao carregar o curso!');
		else
			$this->validate($request, ['idCurso' => 'required']);
			$dados = $request->all();
			$curso->fill($dados)->save();
			return redirect()->route('curso.index')->with('flash_message', 'Curso actualizado com sucesso!');
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $curso = Curso::findOrFail($id);
		if (is_null($curso))
			return redirect()->route('curso.index')->withErrors('Erro ao carregar o curso!');
		else
			$curso->delete();
			return redirect()->route('curso.index')->with('flash_message', 'Curso removido com sucesso!');
    }
	
	// Protect
	public function __construct()
	{
    	$this->middleware('auth');
	}
}