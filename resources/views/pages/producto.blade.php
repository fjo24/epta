@extends('pages.templates.cuerpo')
@section('titulo',Lang::get('general.productos'))
@section('estilo')
	<link rel="stylesheet" href="{{ asset('css/page/producto.css') }}">
	
@endsection
@section('paginas')
	<div class="container-fluid" style="margin: 5% 7%;">
		<div class="row">
			<div class="col s12 m6 titulo-pro">
				<p class="barra">
					{{$nombre->{"nombre_".$idioma} }}
				</p>
			</div>
		</div>
		<div class="row">
			@foreach($subfamilias as $subfamilia)
				<section class="col s12 m4">
					<a href="{{route('subproducto',$subfamilia->id)}}">
						<div class="div-producto">
							<img class="responsive-img" src="{{asset($subfamilia->imagen_destacada)}}" alt=""><div class="producto-hover"></div>
						</div>

						<div class="titulo">
							<p>{{$subfamilia->{"nombre_".$idioma} }}</p>
						</div>
					</a>
				</section>
			@endforeach
		</div>
	</div>
@endsection