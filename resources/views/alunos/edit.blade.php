@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Editar o aluno: "{{ $aluno->nameAluno }}"</h1>
    <hr>
	<form action="{{ route('aluno.update', $aluno->idAluno)}}" method="POST">
		<input type="hidden" name="_method" value="PUT">
        
        <div class="form-group">
            <label for="idAluno" class="control-label">Id:</label>
			<input type="text" id="idAluno" name="idAluno" class="form-control" value="{{ $aluno->idAluno }}" readonly>
        </div>

		<div class="form-group">
            <label for="nameAluno" class="control-label">Nome:</label>
            <input type="text" id="nameAluno" name="nameAluno" class="form-control" value="{{ $aluno->nameAluno }}" required>
        </div>

        <div class="form-group">
            <label for="numeroAluno" class="control-label">Numero Aluno:</label>
            <input type="text" id="numeroAluno" name="numeroAluno" class="form-control" value="{{ $aluno->numeroAluno }}" required>
        </div>
        
        <div class="form-group">
            <label for="passwordAluno" class="control-label">Password:</label>
            <input type="text" id="passwordAluno" name="passwordAluno" class="form-control" value="{{ $aluno->passwordAluno }}" required>
        </div>
        
        <div class="form-group">
            <label for="cursoAluno" class="control-label">Curso do Aluno:</label>
            <select id="cursoAluno" name="cursoAluno" class="form-control" required>
                @foreach($cursos as $curso)
                    <option value="{{ $curso->idCurso }}"> {{ $curso->nameCurso }} </option>
                @endforeach
            </select>
        </div>

        <input type="submit" value="Guardar" class="btn btn-primary">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
</div>
@endsection