@extends('adm.cuerpo')

@section('titulo', 'Crear Categoria')

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
			{!!Form::open(['route'=>'subproductos.store', 'method'=>'POST', 'files' => true])!!}
				<div class="row">
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
						{!!Form::text('nombre_es', null , ['class'=>'validate', 'required'])!!}
					</div>
					<div class="input-field col s12 m6">
						{!!Form::label('Nombre Inglés:')!!}
						{!!Form::text('nombre_en', null , ['class'=>'validate', 'required'])!!}
					</div>
					<div class="input-field col s12 m6">
						{!!Form::label('Nombre Portugués:')!!}
						{!!Form::text('nombre_pt', null , ['class'=>'validate', 'required'])!!}
					</div>
					<div class="input-field col s12 m6">
						{!!Form::label('Orden:')!!}
						{!!Form::text('orden', null , ['class'=>'validate', 'required'])!!}
					</div>
					<div class="input-field col s6">
						<select id="id_familia" name="id_familia">
							@foreach($familias as $familia)
								<option value="{{$familia->id}}">{{$familia->nombre_es}}</option>
							@endforeach
						</select>
						<label>A qué familia desea que permanezca?</label>
					</div>
				</div>
				<div class="col s12 no-padding">
					{!!Form::submit('Crear', ['class'=>'waves-effect waves-light btn right'])!!}
				</div>
			{!!Form::close()!!} 
			</div>
		</div>
	</div>
</main>

@endsection
