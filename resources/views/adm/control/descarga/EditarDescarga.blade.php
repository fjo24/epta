@extends('adm.cuerpo')
@section('titulo', 'Editar Descarga')
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
			{!!Form::model($descarga, ['route'=>['descargas.update',$descarga->id], 'method'=>'PUT', 'files' => true])!!}	
				<div class="row">
					<div class="input-field col s6">
						{!!Form::label('Nombre Español:')!!}
						{!!Form::text('nombre_es', null , ['class'=>'validate', 'required'])!!}
					</div>
					<div class="input-field col s6">
						{!!Form::label('Nombre Inglés:')!!}
						{!!Form::text('nombre_en', null , ['class'=>'validate', 'required'])!!}
					</div>
					<div class="input-field col s6">
						{!!Form::label('Nombre Portugués:')!!}
						{!!Form::text('nombre_pt', null , ['class'=>'validate', 'required'])!!}
					</div>
					<div class="input-field col s6">
						{!!Form::label('Orden:')!!}
						{!!Form::text('orden', null , ['class'=>'validate', 'required'])!!}
					</div>
					
				</div>
				<div class="row">
					<div class="file-field input-field col s12">
						<div class="btn">
						    <span>Ficha español</span>
						    {!! Form::file('ficha_es') !!}
						</div>
						<div class="file-path-wrapper">
						    {!! Form::text('ficha_es',null, ['class'=>'file-path validate']) !!}
						</div>
					</div>
					<div class="file-field input-field col s12">
						<div class="btn">
						    <span>Ficha Inglés</span>
						    {!! Form::file('ficha_en') !!}
						</div>
						<div class="file-path-wrapper">
						    {!! Form::text('ficha_en',null, ['class'=>'file-path validate']) !!}
						</div>
					</div>
					<div class="file-field input-field col s12">
						<div class="btn">
						    <span>Ficha Portugues</span>
						    {!! Form::file('ficha_pt') !!}
						</div>
						<div class="file-path-wrapper">
						    {!! Form::text('ficha_pt',null, ['class'=>'file-path validate']) !!}
						</div>
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