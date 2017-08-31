@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Adicionar novo aluno:</h1>
    <hr>
    <form action="{{ route('aluno.store') }}" method="POST">
        <div class="form-group">
            <label for="nameAluno" class="control-label">Nome:</label>
            <input type="text" id="nameAluno" name="nameAluno" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="numeroAluno" class="control-label">Numero Aluno:</label>
            <input type="text" id="numeroAluno" name="numeroAluno" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="passwordAluno" class="control-label">Password:</label>
            <input type="text" id="passwordAluno" name="passwordAluno" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="cursoAluno" class="control-label">Curso do Aluno:</label>
            <select id="cursoAluno" name="cursoAluno" class="form-control" required>
                @foreach($cursos as $curso)
                    <option value="{{ $curso->idCurso }}"> {{ $curso->nameCurso }} </option>
                @endforeach
            </select>
        </div>

        <input type="submit" value="Inserir" class="btn btn-primary">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
</div>
@endsection