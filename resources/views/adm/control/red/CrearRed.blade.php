@extends('adm.cuerpo')

@section('contenido')

<div class="row">
	{!!  Form::open(['route' => 'redes.store', 'method' => 'POST', 'class'=> 'form-horizontal', 'files' => true ]) !!}
		{{ csrf_field() }}
		<div class="col-md-8 col-md-offset-2" style="padding: 0px 50px;">
			<div class="panel panel-default">
				<div class="panel-heading">Crear red social </div>
				<section class="col-xs 6 panel-body" style="margin: 0px 15px;">
					@if(count($errors) > 0)
			            <div class="alert alert-danger" role="alert">
			              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			              @foreach($errors->all() as $error)
			            <p>{{$error}}</p>
			              @endforeach
			            </div>
			        @endif
			        @include('flash::message')
					<div class="row">
						
						<section class="col-xs-12">
							<div class="form-group">
								{!!Form::label('nombre','Nombre de la red social *')!!}
								{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre de la red social', 'required'])!!}
							</div>
						</section>
					</div>
					<div class="row">
						<section class="col-xs-12">
							<div class="form-group">
								{!!Form::label('link','Link de la red social *')!!}
								{!! Form::text('link', null, ['class' => 'form-control', 'placeholder' => 'Link de la red social', 'required'])!!}
							</div>
						</section>
					</div>
					<div class="row">
						<section class="col-xs-12">
							<div class="form-group">
								{!!Form::label('logo','Logo', ['class' => 'control-label'])!!}
					            {!! Form::file('logo', ['class' => 'form-control'])!!}
							</div>
						</section>
					</div>
					<div class="row">
						<section class="col-xs-12">
							<div class="form-group">
								{!!Form::label('ubicacion','Ubicación ', ['class' => 'control-label'])!!}
			        			{!! Form::select('ubicacion', ['header' => 'Header', 'footer' => 'Footer'], null, ['class' => 'form-control']) !!}
							</div>
						</section>
					</div>
					<div class="row">
						<section class="col-xs-4">
							<div class="form-group">
								{!! Form::submit('Agregar',['class' => 'form-control btn btn-success']) !!}
							</div>
						</section>
					</div>
				</section>		
			</div>
																				
		</div>
		
		
	{!! Form::close() !!}
</div>

@endsection