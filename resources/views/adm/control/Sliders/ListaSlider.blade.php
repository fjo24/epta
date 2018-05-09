@extends('adm.cuerpo')

@section('titulo', 'Editar sliders')

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
					<td>Imagen</td>
					<td>Texto Español</td>
					<td>Texto inglés</td>
					<td>Texto Portugués</td>
					<td>Subtitulo Español</td>
					<td>Subtitulo inglés</td>
					<td>Subtitulo Portugués</td>
					<td>Orden</td>
					<td class="text-right">Acciones</td>
				</thead>
				<tbody>
				@foreach($sliders as $slider)
					<tr>
						<td><img class="slider-foto" src="{{ asset($slider->imagen) }}"></td>
						<td>{!!$slider->texto_es!!}</td>
						<td>{!!$slider->texto_en!!}</td>
						<td>{!!$slider->texto_pt!!}</td>
						<td>{!!$slider->subtitulo_es!!}</td>
						<td>{!!$slider->subtitulo_en!!}</td>
						<td>{!!$slider->subtitulo_pt!!}</td>
						<td>{!!$slider->orden!!}</td>
						<td class="text-right">
							<a href="{{ route('sliders.edit',$slider->id)}}"><i class="material-icons">create</i></a>
							{!!Form::open(['class'=>'en-linea', 'route'=>['sliders.destroy', $slider->id], 'method' => 'DELETE'])!!}
								<button onclick='return confirm_delete(this);' type="submit" class="submit-button">
									<i class="material-icons red-text">cancel</i>
								</button>
							{!!Form::close()!!}
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>			
			</div>
		</div>
    </div>
</main>
<script type="text/javascript" src="{{ asset('js/eliminar.js') }}"></script>

@endsection