@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Editar o evento: "{{ $evento->titleEvento }}"</h1>
    <hr>
	<form action="{{ route('evento.update', $evento->idEvento)}}" method="POST">
		<input type="hidden" name="_method" value="PUT">
		
		<div class="form-group">
            <label for="idEvento" class="control-label">Id:</label>
			<input type="text" id="idEvento" name="idEvento" class="form-control" value="{{ $evento->idEvento }}" readonly>
        </div>
		
		<div class="form-group">
            <label for="titleEvento" class="control-label">Titulo:</label>
            <input type="text" id="titleEvento" name="titleEvento" class="form-control" value="{{ $evento->titleEvento }}" required>
        </div>

        <div class="form-group">
            <label for="descricaoEvento" class="control-label">Descrição do evento:</label>
            <textarea maxlength="2000" rows="6" id="descricaoEvento" name="descricaoEvento" class="form-control" required> {{ $evento->descricaoEvento }} </textarea>
        </div>

        <div class="form-group">
            <label for="diaEvento" class="control-label">Data do evento:</label>
            <input type="date" id="diaEvento" name="diaEvento" class="form-control" value="{{ $evento->diaEvento }}" required>
        </div>

        <input type="submit" value="Guardar" class="btn btn-primary">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
</div>
@endsection