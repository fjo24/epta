@extends('adm.cuerpo')

@section('titulo', 'Crear Producto')

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
			{!!Form::open(['route'=>'general.store', 'method'=>'POST', 'files' => true])!!}
				
				<div class="row">
					<div class="input-field col s6">
						{!!Form::label('id:')!!}
						{!!Form::text('id_subfamilias', $subfamilia->id , ['class'=>'validate', 'required', 'onfocus="this.blur()"'])!!}
					</div>
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
					<div class="input-field col s12">
						{!!Form::textarea('tabla', null, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
				    </div>
				    <label class="col s12" for="contenido_es">Contenido Español</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('contenido_es', null, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
				    </div>
			        <label class="col s12" for="contenido_en">Contenido Inglés</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('contenido_en', null, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
				    </div>
				    <label class="col s12" for="contenido_pt">Contenido Portugués</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('contenido_pt', null, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
				    </div>
				    <div class="row">
						<div class="file-field input-field col s12">
							<div class="btn">
							    <span>Descarga Español</span>
							    {!! Form::file('descarga_es') !!}
							</div>
							<div class="file-path-wrapper">
							    {!! Form::text('descarga_es',null, ['class'=>'file-path validate']) !!}
							</div>
						</div>
					</div>
					<div class="row">
					<div class="file-field input-field col s12">
							<div class="btn">
							    <span>Descarga Inglés</span>
							    {!! Form::file('descarga_en') !!}
							</div>
							<div class="file-path-wrapper">
							    {!! Form::text('descarga_en',null, ['class'=>'file-path validate']) !!}
							</div>
						</div>
					</div>
					<div class="row">
						<div class="file-field input-field col s12">
							<div class="btn">
							    <span>Descarga Portugués</span>
							    {!! Form::file('descarga_pt') !!}
							</div>
							<div class="file-path-wrapper">
							    {!! Form::text('descarga_pt',null, ['class'=>'file-path validate']) !!}
							</div>
						</div>
					</div>
				</div>
				<div class="row">
						<div class="file-field input-field col s12">
							<div class="btn">
							    <span>Soluciones Español</span>
							    {!! Form::file('solucion_es') !!}
							</div>
							<div class="file-path-wrapper">
							    {!! Form::text('solucion_es',null, ['class'=>'file-path validate']) !!}
							</div>
						</div>
					</div>
					<div class="row">
					<div class="file-field input-field col s12">
							<div class="btn">
							    <span>Soluciones Inglés</span>
							    {!! Form::file('solucion_en') !!}
							</div>
							<div class="file-path-wrapper">
							    {!! Form::text('solucion_en',null, ['class'=>'file-path validate']) !!}
							</div>
						</div>
					</div>
					<div class="row">
						<div class="file-field input-field col s12">
							<div class="btn">
							    <span>Soluciones Portugués</span>
							    {!! Form::file('solucion_pt') !!}
							</div>
							<div class="file-path-wrapper">
							    {!! Form::text('solucion_pt',null, ['class'=>'file-path validate']) !!}
							</div>
						</div>
					</div>
					<div class="input-field col s6">
						{!!Form::label('Codigo de descarga:')!!}
						{!!Form::text('codigo1', null , ['class'=>'validate', 'required'])!!}
					</div>
					<div class="input-field col s6">
						{!!Form::label('Codigo de solucion:')!!}
						{!!Form::text('codigo2', null , ['class'=>'validate', 'required'])!!}
					</div>
				<div class="col s12 no-padding">
					{!!Form::submit('Crear', ['class'=>'waves-effect waves-light btn right'])!!}
				</div>
			{!!Form::close()!!} 
			</div>
		</div>
	</div>
</main>

<script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
<script>
	CKEDITOR.replace('tabla');
	CKEDITOR.replace('contenido_es');
	CKEDITOR.replace('contenido_en');
	CKEDITOR.replace('contenido_pt');
	CKEDITOR.config.height = '200px';
	CKEDITOR.config.width = '100%';
</script>
@endsection
