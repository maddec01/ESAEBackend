<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;

class EventoController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $eventos = Evento::all();
		if (is_null($eventos))
			return redirect()->route("index")->withErrors('Erro ao carregar a base de dados!');
        else
            return view("eventos.index", compact('eventos'));
    }

    //Show the form for creating a new resource.
    public function create()
    {
        return view("eventos.create");
    }

    //Store a newly created resource in storage.
    public function store(Request $request)
    {
        $evento = Evento::create($request->all());
		if(is_null($evento))
			return redirect()->route('evento.index')->withErrors('Erro ao carregar o evento!');
        else
            return redirect()->route('evento.index')->with('Evento inserido com sucesso!');
    }

    //Display the specified resource.
    public function show($id)
    {
        //
    }

    //Show the form for editing the specified resource.
    public function edit($id)
    {
        $evento = Evento::findOrFail($id);
		if (is_null($evento))
			return redirect()->route('evento.index')->withErrors('Erro ao carregar o evento!');
		else 
            return view('eventos.edit', compact('evento'));
    }

    //Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $evento = Evento::findOrFail($id);
		if (is_null($evento)) 
			return redirect()->route('evento.index')->withErrors('Erro ao carregar o evento!');
		else
			$this->validate($request, ['idEvento' => 'required']);
			$dados = $request->all();
			$evento->fill($dados)->save();
			return redirect()->route('evento.index')->with('flash_message', 'Evento actualizado com sucesso!');
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $evento = Evento::findOrFail($id);
		if (is_null($evento))
			return redirect()->route('evento.index')->withErrors('Erro ao carregar o evento!');
		else
			$evento->delete();
			return redirect()->route('evento.index')->with('flash_message', 'Evento removido com sucesso!');
    }
	
	// Protect
	public function __construct()
	{
    	$this->middleware('auth');
	}
}