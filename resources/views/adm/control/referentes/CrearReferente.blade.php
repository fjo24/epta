@extends('adm.cuerpo')
@section('contenido')

<div class="row">
	{!!  Form::open(['route' => 'referentes.store', 'method' => 'POST', 'class'=> 'form-horizontal', 'files' => true ]) !!}
		{{ csrf_field() }}
		<div class="col-md-8 col-md-offset-2" style="padding: 0px 50px;">
			<div class="panel panel-default">
				<div class="panel-heading">Crear Referentes </div>
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
								{!!Form::label('empresa','Empresa*')!!}
								{!! Form::text('empresa', null, ['class' => 'form-control', 'placeholder' => 'Nombre del producto', 'required'])!!}
							</div>
						</section>
					</div>
					<div class="row">
						<section class="col-xs-12">
							<div class="form-group">
								{!!Form::label('orden','Orden *')!!}
								{!! Form::text('orden', null, ['class' => 'form-control', 'placeholder' => 'Nombre del producto', 'required'])!!}
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