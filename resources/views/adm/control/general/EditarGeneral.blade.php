@extends('adm.cuerpo')

@section('titulo', 'Editar Producto')

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
			{!!Form::model($general, ['route'=>['general.update',$general->id], 'method'=>'PUT', 'files' => true])!!}	
				<div class="row">
					<div class="input-field col s6">
						{!!Form::label('id:')!!}
						{!!Form::text('id_subfamilias', $general->id_subfamilias , ['class'=>'validate', 'required', 'onfocus="this.blur()"'])!!}
					</div>
					<div class="row">
						<img src="{{asset($general->imagen_destacada)}}" alt="">
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
						{!!Form::text('nombre_es', $general->nombre_es, ['class'=>'validate', 'required'])!!}
					</div>
					<div class="input-field col s6">
						{!!Form::label('Nombre Inglés:')!!}
						{!!Form::text('nombre_en', $general->nombre_en, ['class'=>'validate', 'required'])!!}
					</div>
					<div class="input-field col s6">
						{!!Form::label('Nombre Portugués:')!!}
						{!!Form::text('nombre_pt', $general->nombre_pt , ['class'=>'validate', 'required'])!!}
					</div>
					<div class="input-field col s6">
						{!!Form::label('Orden:')!!}
						{!!Form::text('orden', $general->orden , ['class'=>'validate', 'required'])!!}
					</div>
					<label class="col s12" for="tabla">Tabla</label>
					<div class="input-field col s12">
						{!!Form::textarea('tabla', $general->tabla, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
				    </div>
				    <label class="col s12" for="contenido_es">Contenido Español</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('contenido_es', $general->contenido_es, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
				    </div>
			        <label class="col s12" for="contenido_en">Contenido Inglés</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('contenido_en', $general->contenido_en, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
				    </div>
				    <label class="col s12" for="contenido_pt">Contenido Portugués</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('contenido_pt', $general->contenido_pt, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
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
						{!!Form::text('codigo1', $general->codigo1 , ['class'=>'validate', 'required'])!!}
					</div>
					<div class="input-field col s6">
						{!!Form::label('Codigo de solucion:')!!}
						{!!Form::text('codigo2', $general->codigo2 , ['class'=>'validate', 'required'])!!}
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
