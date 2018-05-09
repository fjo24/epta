@extends('adm.cuerpo')
@section('titulo','Referentes')
@section('contenido')

	<div class="content-lista">
		
		<div class="row">
		<div class="col-xs-12 col-md-12">
			@include('flash::message')
			<div class="table-responsive size-table tabla">
				<table class="table table-condensed table-bordered table-hover ">
					<thead>
						<tr>
							<th class="text-center">Empresa</th>
							<th class="text-center">Orden</th>
							<th class="text-center">Acción</th>
						</tr>
					</thead>
					<tbody>
						@foreach($referentes as $referente)
							<tr>
								<td style="width: 200px;" class="text-center">{{ $referente->empresa }}</td>
								<td style="width: 20px;" class="text-center">{{ $referente->orden }}</td>
								<td>
									<center><a class="btn btn-warning" id="editar" href="{{ route('referentes.edit', $referente->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
									<a class="btn btn-danger" id="eliminar" href="{{ route('referentes.destroy', $referente->id) }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
								</center>
								</td>
								
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<center>{!! $referentes->render() !!}</center>
		</div>
	</div>
	</div>

@endsection