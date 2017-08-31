@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Editar o aviso: "{{ $aviso->titleAviso }}"</h1>
    <hr>
	<form action="{{ route('aviso.update', $aviso->idAviso)}}" method="POST">
		<input type="hidden" name="_method" value="PUT">
        
        <div class="form-group">
            <label for="idAviso" class="control-label">Id:</label>
			<input type="text" id="idAviso" name="idAviso" class="form-control" value="{{ $aviso->idAviso }}" readonly>
        </div>
        
        <div class="form-group">
            <label for="titleAviso" class="control-label">Titulo:</label>
            <input type="text" id="titleAviso" name="titleAviso" class="form-control" value="{{ $aviso->titleAviso }}" required>
        </div>
        
        <div class="form-group">
            <label for="cursoAviso" class="control-label">Curso do Aviso:</label>
            <select id="cursoAviso" name="cursoAviso" class="form-control" required>
                @foreach($cursos as $curso)
                    <option value="{{ $curso->idCurso }}"> {{ $curso->nameCurso }} </option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="textAviso" class="control-label">Aviso:</label>
            <textarea maxlength="2000" rows="6" id="textAviso" name="textAviso" class="form-control" required> {{ $aviso->textAviso }} </textarea>
        </div>

        <input type="submit" value="Guardar" class="btn btn-primary">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
</div>
@endsection