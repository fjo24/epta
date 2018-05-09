@extends('pages.templates.cuerpo')
@section('titulo', Lang::get('general.descargas'))
@section('estilo')
	<link rel="stylesheet" href="{{ asset('css/page/descargas.css') }}">
@endsection

@section('paginas')
 	<section class="container-fluid" style="margin: 5% 7%;">
 		<article class="row">
 			<div class="col s12">
 				<p class="barra">{{ Lang::get('general.descargas') }}</p>
 			</div>
 		</article>
 		<article class="row">
 			@foreach($descargas as $descarga)
	 			<div class="col s12 m6">
	 				<a href="{{asset($descarga->{"ficha_".$idioma} )}}" download="" class="div-descarga hoverable">
	 					<div class="pdf hide-on-small-only"><img class="responsive-img" src="{{asset('img/generico/pdf.png')}}" alt=""></div>
	 					<div class="nombre">{{$descarga->{"nombre_".$idioma} }}</div>
	 					<div class="download"><img class="responsive-img" src="{{asset('img/generico/down.png')}}" alt=""></div>
	 				</a>
	 			</div>
 			@endforeach
 		</article>
 	</section>
@endsection