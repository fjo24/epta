@extends('adm.cuerpo')

@section('titulo','Lista de las redes social')

@section('contenido')

	<div class="content-lista">
		
		<div class="row">
		<div class="col-xs-12 col-md-12">
		
			@include('flash::message')
			<div class="table-responsive size-table tabla">
				<table class="table table-condensed table-hover ">
					<thead>
						<tr>
							<th class="text-center">Nombre</th>
							<th class="text-center">Link</th>
							<th class="text-center">Logo</th>
							<th class="text-center">Ubicacion</th>
							<th>Acción</th>
						</tr>
					</thead>
					<tbody>
						@foreach($redes as $red)
						<tr>
							<td class="text-center">{{ $red->nombre }}</td>
							<td class="text-center">{{ $red->link }}</td>
							<td class="text-center"><img src="{{ asset($red->logo) }}" alt="logo-red-social"></td>
							<td class="text-center">{{ $red->ubicacion }}</td>
							<td>
								<a class="btn btn-warning" id="editar" href="{{ route('redes.edit', $red->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
								<a class="btn btn-danger" id="eliminar" href="{{ route('redes.destroy', $red->id) }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
							</td>
							
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<center>{!! $redes->render() !!}</center> 
		</div>
	</div>
	</div>

@endsection