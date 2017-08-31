@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Adicionar novo aviso:</h1>
    <hr>
    <form action="{{ route('aviso.store') }}" method="POST">
        <div class="form-group">
            <label for="titleAviso" class="control-label">Titulo:</label>
            <input type="text" id="titleAviso" name="titleAviso" class="form-control" required>
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
            <textarea maxlength="2000" rows="6" id="textAviso" name="textAviso" class="form-control" required></textarea>
        </div>

        <input type="submit" value="Inserir" class="btn btn-primary">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
</div>
@endsection