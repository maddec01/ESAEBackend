@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Lista de Cursos</h1>
    <p class="lead">Aqui pode consultar a lista dos cursos existentes</p>
    <hr>
    
    <div class="container-fluid table-responsive">
        <table class="table table-hover">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Tipo de Curso</th>
                <th>Responsável</th>
                <th>Descrição</th>
                <th>Editar</th>
                <th>Eleminar</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cursos as $curso)
            <tr>
                <td><?php echo $curso->nameCurso; ?></td>
                <td><?php echo $curso->tipoCurso; ?></td>
                <td><?php echo $curso->responsavelCurso; ?></td>
                <td><?php echo $curso->descricaoCurso; ?></td>
                
                <!-- edit button -->
                <td><a class="btn btn-default" href="{{ URL::route('curso.edit', $curso->idCurso) }}">Editar</a></td>


                <!-- coluna de apagar veículo -->
                <td>
                    <form action="{{ route('curso.destroy', $curso->idCurso) }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
        </table>
    </div>
    
    <p><a href="{{ URL::route('curso.create') }}">Clique aqui para adicionar um novo curso.</a></p>
</div>
@endsection