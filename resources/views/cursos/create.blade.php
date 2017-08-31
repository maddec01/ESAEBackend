@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Adicionar novo curso:</h1>
    <hr>
    <form action="{{ route('curso.store') }}" method="POST">
        <div class="form-group">
            <label for="nameCurso" class="control-label">Nome:</label>
            <input type="text" id="nameCurso" name="nameCurso" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="tipoCurso" class="control-label">Tipo de Curso:</label>
            <input type="text" id="tipoCurso" name="tipoCurso" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="responsavelCurso" class="control-label">Responsável:</label>
            <input type="text" id="responsavelCurso" name="responsavelCurso" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="descricaoCurso" class="control-label">Descrição:</label>
            <textarea maxlength="2000" rows="6" id="descricaoCurso" name="descricaoCurso" class="form-control" required></textarea>
        </div>

        <input type="submit" value="Inserir" class="btn btn-primary">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
</div>
@endsection