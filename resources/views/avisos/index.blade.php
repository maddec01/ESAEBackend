@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Lista de Avisos</h1>
    <p class="lead">Aqui pode consultar a lista dos avisos existentes</p>
    <hr>
    
    <div class="container-fluid table-responsive">
        <table class="table table-hover">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Curso</th>
                <th>Texto</th>
                <th>Editar</th>
                <th>Eleminar</th>
            </tr>
        </thead>
        <tbody>
        @foreach($avisos as $aviso)
            <tr>
                <td><?php echo $aviso->titleAviso; ?></td>
                <td><?php echo $aviso->cursoAviso; ?></td>
                <td><?php echo $aviso->textAviso; ?></td>
                
                <!-- edit button -->
                <td><a class="btn btn-default" href="{{ URL::route('aviso.edit', $aviso->idAviso) }}">Editar</a></td>


                <!-- coluna de apagar veículo -->
                <td>
                    <form action="{{ route('aviso.destroy', $aviso->idAviso) }}" method="POST">
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
    
    <p><a href="{{ URL::route('aviso.create') }}">Clique aqui para adicionar um novo aviso.</a></p>
</div>
@endsection