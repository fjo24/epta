@extends('adm.cuerpo')

@section('titulo', 'Crear Slider Home')

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
			{!!Form::open(['route'=>'sliders.store', 'method'=>'POST', 'files' => true])!!}
				<div class="row">
					<div class="file-field input-field col s12">
						<div class="btn">
						    <span>Imagen</span>
						    {!! Form::file('imagen') !!}
						</div>
						<div class="file-path-wrapper">
						    {!! Form::text('imagen',null, ['class'=>'file-path validate']) !!}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s6">
						{!!Form::label('Orden:')!!}
						{!!Form::text('orden', null , ['class'=>'validate', 'required'])!!}
					</div>
					<div class="input-field col s6">
						<select id="seccion" name="seccion">
						  <option value="{{$seccion}}">{{$seccion}}</option>
						</select>
						<label>Donde debe aparecer el slider?</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s6">
				        <textarea id="texto_es" name="texto_es" class="materialize-textarea" required></textarea>
				        <label for="texto_es">Texto español</label>
				     </div>
				     <div class="input-field col s6">
				        <textarea id="texto_en" name="texto_en" class="materialize-textarea" required></textarea>
				        <label for="texto_en">Texto Ingles</label>
				     </div>
				     <div class="input-field col s12">
				        <textarea id="texto_pt" name="texto_pt" class="materialize-textarea" required></textarea>
				        <label for="texto_pt">Texto Portugués</label>
				     </div>
				</div>
				<div class="row">
					<div class="input-field col s6">
				        <textarea id="subtitulo_es" name="subtitulo_es" class="materialize-textarea" required></textarea>
				        <label for="subtitulo_es">Subtitulo español</label>
				     </div>
				     <div class="input-field col s6">
				        <textarea id="subtitulo_en" name="subtitulo_en" class="materialize-textarea" required></textarea>
				        <label for="subtitulo_en">Subtitulo Ingles</label>
				     </div>
				     <div class="input-field col s12">
				        <textarea id="subtitulo_pt" name="subtitulo_pt" class="materialize-textarea" required></textarea>
				        <label for="subtitulo_pt">Subtitulo Portugués</label>
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
