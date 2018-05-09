@extends('adm.cuerpo')

@section('titulo', 'Editar Slider')

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
			{!!Form::model($slider, ['route'=>['sliders.update',$slider->id], 'method'=>'PUT', 'files' => true])!!}
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
					<div class="input-field col s6">
						{!!Form::label('Orden:')!!}
						{!!Form::text('orden',$slider->orden,['class'=>'validate'])!!}
					</div>
				</div>
				<div class="row">
			        <label class="col s12" for="parrafo">Texto español</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('texto_es', $slider->texto_es, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
				    </div>
				    <label class="col s12" for="parrafo">Subtitulo español</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('subtitulo_es', $slider->subtitulo_es, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
				    </div>
			        <label class="col s12" for="parrafo">Texto Inglés</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('texto_en', $slider->texto_en, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
				    </div>
				    <label class="col s12" for="parrafo">Subtitulo Inglés</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('subtitulo_en', $slider->subtitulo_en, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
				    </div>
			        <label class="col s12" for="parrafo">Texto Portugués</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('texto_pt', $slider->texto_pt, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
				    </div>
				    <label class="col s12" for="parrafo">Subtitulo Portugués</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('subtitulo_pt', $slider->subtitulo_pt, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
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
	CKEDITOR.replace('texto_es');
	CKEDITOR.replace('texto_en');
	CKEDITOR.replace('texto_pt');
	CKEDITOR.replace('subtitulo_es');
	CKEDITOR.replace('subtitulo_en');
	CKEDITOR.replace('subtitulo_pt');
	CKEDITOR.config.height = '200px';
	CKEDITOR.config.width = '100%';
</script>
@endsection
