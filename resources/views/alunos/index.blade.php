@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Lista de Alunos</h1>
    <p class="lead">Aqui pode consultar a lista dos alunoss existentes</p>
    <hr>
    
    <div class="container-fluid table-responsive">
        <table class="table table-hover">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Numero de Aluno</th>
                <th>Password</th>
                <th>Curso</th>
                <th>Editar</th>
                <th>Eleminar</th>
            </tr>
        </thead>
        <tbody>
        @foreach($alunos as $aluno)
            <tr>
                <td><?php echo $aluno->nameAluno; ?></td>
                <td><?php echo $aluno->numeroAluno; ?></td>
                <td><?php echo $aluno->passwordAluno; ?></td>
                <td><?php echo $aluno->cursoAluno; ?></td>
                
                <!-- edit button -->
                <td><a class="btn btn-default" href="{{ URL::route('aluno.edit', $aluno->idAluno) }}">Editar</a></td>


                <!-- coluna de apagar veículo -->
                <td>
                    <form action="{{ route('aluno.destroy', $aluno->idAluno) }}" method="POST">
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
    
    <p><a href="{{ URL::route('aluno.create') }}">Clique aqui para adicionar um novo aluno.</a></p>
</div>
@endsection