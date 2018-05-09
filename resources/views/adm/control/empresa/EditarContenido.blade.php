@extends('adm.cuerpo')

@section('titulo', 'Editar Empresa')

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
			{!!Form::model($contenido, ['route'=>['contenido.update',$contenido->id], 'method'=>'PUT', 'files' => true])!!}
				<div class="row">
					<div class="file-field input-field col s6">
						<div class="btn">
						    <span>Imagen de empresa</span>
						    {!! Form::file('imagen') !!}
						</div>
						<div class="file-path-wrapper">
						    {!! Form::text('imagen',null, ['class'=>'file-path validate']) !!}
						</div>
					</div>
					<div class="file-field input-field col s6">
						<div class="btn">
						    <span>Imagen cabecera</span>
						    {!! Form::file('imagen_cabecera') !!}
						</div>
						<div class="file-path-wrapper">
						    {!! Form::text('imagen_cabecera',null, ['class'=>'file-path validate']) !!}
						</div>
					</div>
					<label class="col s12" for="parrafo">Titulo Inglés</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('titulo_es', $contenido->titulo_en, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
				    </div>
					<label class="col s12" for="parrafo">Titulo Inglés</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('titulo_en', $contenido->titulo_es, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
				    </div>
					<label class="col s12" for="parrafo">Titulo Inglés</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('titulo_pt', $contenido->titulo_pt, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
				    </div>
					
				    <label class="col s12" for="parrafo">Contenido Español</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('contenido_es', $contenido->contenido_es, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
				    </div>
				    <label class="col s12" for="parrafo">Contenido Inglés</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('contenido_en', $contenido->contenido_en, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
				    </div>
				    <label class="col s12" for="parrafo">Contenido Portugues</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('contenido_pt', $contenido->contenido_pt, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
				    </div>
				</div>
				<div class="col s12 no-padding">
					{!!Form::submit('Guardar', ['class'=>'waves-effect waves-light btn right'])!!}
				</div>
			{!!Form::close()!!} 
			</div>
			</div>
		</div>
	</main>
<script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
<script>
	CKEDITOR.replace('titulo_es');
	CKEDITOR.replace('titulo_en');
	CKEDITOR.replace('titulo_pt');
	CKEDITOR.replace('contenido_es');
	CKEDITOR.replace('contenido_en');
	CKEDITOR.replace('contenido_pt');
	CKEDITOR.config.height = '150px';
	CKEDITOR.config.width = '100%';
</script>
@endsection

