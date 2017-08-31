<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aluno;
use App\Curso;

class AlunoController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $alunos = Aluno::all();
		if (is_null($alunos))
			return redirect()->route("index")->withErrors('Erro ao carregar a base de dados!');
        else
            return view("alunos.index", compact('alunos'));
    }

    //Show the form for creating a new resource.
    public function create()
    {
        $cursos = Curso::all();
        return view("alunos.create", compact('cursos'));
    }

    //Store a newly created resource in storage.
    public function store(Request $request)
    {
        $aluno = Aluno::create($request->all());
		if(is_null($aluno))
			return redirect()->route('aluno.index')->withErrors('Erro ao carregar o curso!');
        else
            return redirect()->route('aluno.index')->with('Curso inserido com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    //Show the form for editing the specified resource.
    public function edit($id)
    {
        $aluno = Aluno::findOrFail($id);
        $cursos = Curso::all();
		if (is_null($aluno))
			return redirect()->route('curso.index')->withErrors('Erro ao carregar o aluno!');
		else 
            return view('alunos.edit', compact('aluno'), compact('cursos'));
    }

    //Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $aluno = Aluno::findOrFail($id);
		if (is_null($aluno)) 
			return redirect()->route('aluno.index')->withErrors('Erro ao carregar o aluno!');
		else
			$this->validate($request, ['idAluno' => 'required']);
			$dados = $request->all();
			$aluno->fill($dados)->save();
			return redirect()->route('aluno.index')->with('flash_message', 'Aluno actualizado com sucesso!');
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $aluno = Aluno::findOrFail($id);
		if (is_null($aluno)) 
			return redirect()->route('aluno.index')->withErrors('Erro ao carregar o aluno!');
		else
			$aluno->delete();
			return redirect()->route('aluno.index')->with('flash_message', 'Aluno removido com sucesso!');
    }
	
	// Protect
	public function __construct()
	{
    	$this->middleware('auth');
	}
}
