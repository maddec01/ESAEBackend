@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Lista de Eventos</h1>
    <p class="lead">Aqui pode consultar a lista de eventos</p>
    <hr>
    
    <div class="container-fluid table-responsive">
        <table class="table table-hover">
        <thead>
            <tr>
                <th>Titulo</th>
                <th style="width:100px">Data</th>
                <th>Descrição</th>
                <th>Editar</th>
                <th>Eleminar</th>
            </tr>
        </thead>
        <tbody>
			
        <?php $mytime = Carbon\Carbon::now(); ?>
		
		@foreach($eventos as $evento)
			<tr>
				<td><?php echo $evento->titleEvento; ?></td>
				
				@if($mytime->toDateString() <= $evento->diaEvento)
					<td bgcolor="#79ec8f"><strong><?php echo $evento->diaEvento; ?></strong></td>
				@else
					<td bgcolor="#cf5252"><strong><?php echo $evento->diaEvento; ?></strong></td>
				@endif

                <td><?php echo $evento->descricaoEvento; ?></td>
                
                <!-- edit button -->
                <td><a class="btn btn-default" href="{{ URL::route('evento.edit', $evento->idEvento) }}">Editar</a></td>


                <!-- coluna de apagar veículo -->
                <td>
                    <form action="{{ route('evento.destroy', $evento->idEvento) }}" method="POST">
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
    
    <p><a href="{{ URL::route('evento.create') }}">Clique aqui para adicionar um novo evento.</a></p>
</div>
@endsection