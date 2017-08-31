@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Editar o curso: "{{ $curso->nameCurso }}"</h1>
    <hr>
	<form action="{{ route('curso.update', $curso->idCurso)}}" method="POST">
		<input type="hidden" name="_method" value="PUT">

		<div class="form-group">
            <label for="idCurso" class="control-label">Id:</label>
			<input type="text" id="idCurso" name="idCurso" class="form-control" value="{{ $curso->idCurso }}" readonly>
        </div>

        <div class="form-group">
            <label for="nameCurso" class="control-label">Nome:</label>
            <input type="text" id="nameCurso" name="nameCurso" class="form-control" value="{{ $curso->nameCurso }}" required>
        </div>

        <div class="form-group">
            <label for="tipoCurso" class="control-label">Tipo de Curso:</label>
            <input type="text" id="tipoCurso" name="tipoCurso" class="form-control" value="{{ $curso->tipoCurso }}" required>
        </div>
        
        <div class="form-group">
            <label for="responsavelCurso" class="control-label">Responsável:</label>
            <input type="text" id="responsavelCurso" name="responsavelCurso" class="form-control" value="{{ $curso->responsavelCurso }}" required>
        </div>

        <div class="form-group">
            <label for="descricaoCurso" class="control-label">Descrição:</label>
            <textarea maxlength="2000" rows="6" id="descricaoCurso" name="descricaoCurso" class="form-control" required> {{ $curso->descricaoCurso }} </textarea>
        </div>

        <input type="submit" value="Guardar" class="btn btn-primary">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
</div>
@endsection