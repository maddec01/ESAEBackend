<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aviso;
use App\Curso;

class AvisoController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $avisos = Aviso::all();
		if (is_null($avisos))
			return redirect()->route("index")->withErrors('Erro ao carregar a base de dados!');
        else
            return view("avisos.index", compact('avisos'));
    }

    //Show the form for creating a new resource.
    public function create()
    {
        $cursos = Curso::all();
        return view("avisos.create", compact('cursos'));
    }

    //Store a newly created resource in storage.
    public function store(Request $request)
    {
        $aviso = Aviso::create($request->all());
		if(is_null($aviso))
			return redirect()->route('aviso.index')->withErrors('Erro ao carregar o aviso!');
        else
            return redirect()->route('aviso.index')->with('Aviso inserido com sucesso!');
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
        $aviso = Aviso::findOrFail($id);
        $cursos = Curso::all();
		if (is_null($aviso))
			return redirect()->route('aviso.index')->withErrors('Erro ao carregar o aviso!');
		else 
            return view('avisos.edit', compact('aviso'), compact('cursos'));
    }

    //Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $aviso = Aviso::findOrFail($id);
		if (is_null($aviso)) 
			return redirect()->route('aviso.index')->withErrors('Erro ao carregar o aviso!');
		else
			$this->validate($request, ['idAviso' => 'required']);
			$dados = $request->all();
			$aviso->fill($dados)->save();
			return redirect()->route('aviso.index')->with('flash_message', 'Aviso actualizado com sucesso!');
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $aviso = Aviso::findOrFail($id);
		if (is_null($aviso)) 
			return redirect()->route('aviso.index')->withErrors('Erro ao carregar o aviso!');
		else
			$aviso->delete();
			return redirect()->route('aviso.index')->with('flash_message', 'Aviso removido com sucesso!');
    }
	
	// Protect
	public function __construct()
	{
    	$this->middleware('auth');
	}
}