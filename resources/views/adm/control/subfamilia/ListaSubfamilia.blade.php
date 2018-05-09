@extends('adm.cuerpo')

@section('titulo', 'Lista de Categoria')

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
					<td>Familia</td>
					<td>Nombre Español</td>
					<td>Nombre inglés</td>
					<td>Nombre Portugués</td>
					<td>Orden</td>
					<td class="text-right">Acciones</td>
				</thead>
				<tbody>
				@foreach($subfamilias as $subfamilia)
					@foreach($familias as $familia)
						@if($subfamilia->id_familia == $familia->id)
						<tr>
							<td>{{ $familia->nombre_es }}</td>
							<td>{!!$subfamilia->nombre_es!!}</td>
							<td>{!!$subfamilia->nombre_en!!}</td>
							<td>{!!$subfamilia->nombre_pt!!}</td>
							<td>{!!$subfamilia->orden!!}</td>
							<td class="text-right">
								<a href="{{ route('subproductos.edit',$subfamilia->id)}}"><i class="material-icons">create</i></a>
								<a href="{{ route('general.create_general',$subfamilia->id)}}">Crear Producto</i></a>
								<a href="{{ route('general.index_general',$subfamilia->id)}}">Lista de Productos</i></a>
								{!!Form::open(['class'=>'en-linea', 'route'=>['subproductos.destroy', $subfamilia->id], 'method' => 'DELETE'])!!}
									<button onclick='return confirm_delete(this);' type="submit" class="submit-button">
										<i class="material-icons red-text">cancel</i>
									</button>
								{!!Form::close()!!}
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