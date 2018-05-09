@extends('adm.cuerpo')

@section('titulo', 'Editar Destacados')

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
			{!!Form::model($home, ['route'=>['home.update',$home->id], 'method'=>'PUT', 'files' => true])!!}
				<div class="row">
					<div class="input-field col s12 m6">
						{!!Form::label('Link :')!!}
						{!!Form::text('link',$home->link,['class'=>'validate'])!!}
					</div>
					<label class="col s12" for="parrafo">Titulo Inglés</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('titulo_es', $home->nombre_es, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
				    </div>
					<label class="col s12" for="parrafo">Titulo Inglés</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('titulo_en', $home->nombre_en, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
				    </div>
					<label class="col s12" for="parrafo">Titulo Inglés</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('titulo_pt', $home->nombre_pt, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
				    </div>
					<label class="col s12" for="parrafo">Subtitulo Español</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('subtitulo_es', $home->subtitulo_es, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
				    </div>
					<label class="col s12" for="parrafo">Subtitulo Inglés</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('subtitulo_en', $home->subtitulo_en, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
				    </div>
				    <label class="col s12" for="parrafo">Subtitulo Portugues</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('subtitulo_pt', $home->subtitulo_pt, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
				    </div>
				    <label class="col s12" for="parrafo">Contenido Español</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('contenido_es', $home->contenido_es, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
				    </div>
				    <label class="col s12" for="parrafo">Contenido Inglés</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('contenido_en', $home->contenido_en, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
				    </div>
				    <label class="col s12" for="parrafo">Contenido Portugues</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('contenido_pt', $home->contenido_pt, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
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
	CKEDITOR.replace('subtitulo_es');
	CKEDITOR.replace('subtitulo_en');
	CKEDITOR.replace('subtitulo_pt');
	CKEDITOR.replace('contenido_es');
	CKEDITOR.replace('contenido_en');
	CKEDITOR.replace('contenido_pt');
	CKEDITOR.config.height = '100px';
	CKEDITOR.config.width = '100%';
</script>
@endsection