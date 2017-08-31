@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Adicionar novo evento:</h1>
    <hr>
    <form action="{{ route('evento.store') }}" method="POST">
        <div class="form-group">
            <label for="titleEvento" class="control-label">Titulo:</label>
            <input type="text" id="titleEvento" name="titleEvento" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="descricaoEvento" class="control-label">Descrição do evento:</label>
            <textarea maxlength="2000" rows="6" id="descricaoEvento" name="descricaoEvento" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="diaEvento" class="control-label">Data do evento:</label>
            <input type="date" id="diaEvento" name="diaEvento" class="form-control" required>
        </div>

        <input type="submit" value="Inserir" class="btn btn-primary">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
</div>
@endsection