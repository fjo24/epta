@extends('adm.cuerpo')

@section('titulo', 'Editar Mision')

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
			{!!Form::model($mision, ['route'=>['mision.update',$mision->id], 'method'=>'PUT', 'files' => true])!!}
				<div class="row">
					<div class="file-field input-field col s6">
						<div class="btn">
						    <span>Imagen</span>
						    {!! Form::file('imagen') !!}
						</div>
						<div class="file-path-wrapper">
						    {!! Form::text('imagen',null, ['class'=>'file-path validate']) !!}
						</div>
					</div>
					<label class="col s12" for="parrafo">Titulo Inglés</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('titulo_es', $mision->titulo_en, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
				    </div>
					<label class="col s12" for="parrafo">Titulo Inglés</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('titulo_en', $mision->titulo_en, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
				    </div>
					<label class="col s12" for="parrafo">Titulo Inglés</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('titulo_pt', $mision->titulo_en, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
				    </div>
					
				    <label class="col s12" for="parrafo">Contenido Español</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('contenido_es', $mision->contenido_es, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
				    </div>
				    <label class="col s12" for="parrafo">Contenido Inglés</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('contenido_en', $mision->contenido_en, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
				    </div>
				    <label class="col s12" for="parrafo">Contenido Portugues</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('contenido_pt', $mision->contenido_pt, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
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

