@extends('adm.cuerpo')

@section('titulo', 'Lista Producto')

@section('contenido')
<main>
	<div class="container">
	    @if(count($errors) > 0)
		<div class="col s12 card-panel red lighten-4 red-text text-darken-4">
	  		<ul>
	  			@foreach($errors->all() as $error)
	  				<li>{!!$error!!}</li>
	  			@endforeach
	  		</ul>
	  	</div>
		@endif
		@if(session('success'))
		<div class="col s12 card-panel green lighten-4 green-text text-darken-4">
			{{ session('success') }}
		</div>
		@endif

		<div class="row">
			<div class="col s12">
				<table class="highlight bordered">
					<thead>
						<td>Categoria</td>
						<td>Nombre Español</td>
						<td>Nombre inglés</td>
						<td>Nombre Portugués</td>
						<td>Contenido Español</td>
						<td>Contenido inglés</td>
						<td>Contenido Portugués</td>
						<td>Codigo Descarga</td>
						<td>Codigo Solucion</td>
						<td>Orden</td>
						<td class="text-right">Acciones</td>
					</thead>
					<tbody>
					@foreach($subfamilias as $subfamilia)
						@foreach($generales as $general)
							@if($general->id_subfamilias == $subfamilia->id)
								<tr>
									<td>{!!$subfamilia->nombre_es!!}</td>
									<td>{!!$general->nombre_es!!}</td>
									<td>{!!$general->nombre_en!!}</td>
									<td>{!!$general->nombre_pt!!}</td>
									<td>{!!$general->contenido_es!!}</td>
									<td>{!!$general->contenido_en!!}</td>
									<td>{!!$general->contenido_pt!!}</td>
									<td>{!!$general->codigo1!!}</td>
									<td>{!!$general->codigo2!!}</td>
									<td>{!!$general->orden!!}</td>
									<td class="text-right">
										<a href="{{ route('general.edit',$general->id)}}"><i class="material-icons">create</i></a>
										{!!Form::open(['class'=>'en-linea', 'route'=>['general.destroy', $general->id], 'method' => 'DELETE'])!!}
											<button onclick='return confirm_delete(this);' type="submit" class="submit-button">
												<i class="material-icons red-text">cancel</i>
											</button>
										{!!Form::close()!!}
										<a href="{{ route('galeria.create_galeria',$general->id)}}">Crear Galeria</a>
										<a href="{{ route('galeria.index_galeria',$general->id)}}">Lista de Galeria</a>
									</td>
								</tr>
							@endif
						@endforeach
					@endforeach
					</tbody>
				</table>			
			</div>
		</div>
    </div>
</main>
<script type="text/javascript" src="{{ asset('js/eliminar.js') }}"></script>

@endsection