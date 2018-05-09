@extends('adm.cuerpo')

@section('titulo', 'Editar Categoria')

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
			{!!Form::model($subproducto, ['route'=>['subproductos.update',$subproducto->id], 'method'=>'PUT', 'files' => true])!!}
				<div class="row">
					<img src="{{asset($subproducto->imagen_destacada)}}" alt="">
					<div class="file-field input-field col s12">
						<div class="btn">
						    <span>Imagen</span>
						    {!! Form::file('imagen_destacada') !!}
						</div>
						<div class="file-path-wrapper">
						    {!! Form::text('imagen_destacada',null, ['class'=>'file-path validate']) !!}
						</div>
					</div>
				</div>
				<div class="row">

					<div class="input-field col s12 m6">
						{!!Form::label('Nombre Español:')!!}
						{!!Form::text('nombre_es', $subproducto->nombre_es , ['class'=>'validate', 'required'])!!}
					</div>
					<div class="input-field col s12 m6">
						{!!Form::label('Nombre Inglés:')!!}
						{!!Form::text('nombre_en', $subproducto->nombre_en , ['class'=>'validate', 'required'])!!}
					</div>
					<div class="input-field col s12 m6">
						{!!Form::label('Nombre Portugués:')!!}
						{!!Form::text('nombre_pt', $subproducto->nombre_pt , ['class'=>'validate', 'required'])!!}
					</div>
					<div class="input-field col s12 m6">
						{!!Form::label('Orden:')!!}
						{!!Form::text('orden', $subproducto->orden , ['class'=>'validate', 'required'])!!}
					</div>
				</div>
				<div class="col s12 no-padding">
					{!!Form::submit('Actualizar', ['class'=>'waves-effect waves-light btn right'])!!}
				</div>
			{!!Form::close()!!} 
			</div>
		</div>
	</div>
</main>

@endsection
