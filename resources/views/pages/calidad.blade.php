@extends('pages.templates.cuerpo')
@section('titulo', Lang::get('general.calidad'))
@section('estilo')
	<link rel="stylesheet" href="{{ asset('css/page/calidad.css') }}">
@endsection

@section('paginas')
	<section class="container-fluid" style="margin: 5% 7%;">
		<article class="row">
 			<div class="col s12">
 				<p class="barra">{{ Lang::get('general.calidad') }}</p>
 			</div>
 		</article>
 		<div class="row center-align">
 			<img class="responsive-img" src="{{asset($calidad->imagen)}}" alt="">
 		</div>
 		<div class="row">	
				<div class="col s12 m6 contenido">	
					{!! $calidad->{"contenido_".$idioma} !!}
				</div>
				<div class="col s12 m6">
					<div style="padding: 15px 0px;">
						<img class="responsive-img" style="padding-right: 10px;" src="{{asset($calidad->icono1)}}" alt="">	
						<img class="responsive-img" src="{{asset($calidad->icono2)}}" alt="">	
					</div>
					<div class="subtitulo">	
						{!! $calidad->{"titulo_".$idioma} !!}
					</div>
				</div>
 		</div>
 		<article class="row">
 			@foreach($descargas as $descarga)
 				@if($idioma == 'pt' or $idioma =='en')
					@if(!$descarga->ficha_pt or !$descarga->ficha_en)
			 			<div class="col s12 m6">
			 				<a href="{{asset($descarga->ficha_es) }}" download="{{$descarga->{"ficha_".$idioma} }}" class="div-descarga hoverable">
			 					<div class="nombre">{{$descarga->{"nombre_".$idioma} }}</div>
			 					<div class="download"><img class="responsive-img" src="{{asset('img/generico/download.png')}}" alt=""></div>
			 				</a>
			 			</div>
			 		@else
			 			<div class="col s12 m6">
			 				<a href="{{asset($descarga->{"ficha".$idioma}) }}" download="{{$descarga->{"ficha_".$idioma} }}" class="div-descarga hoverable">
			 					<div class="nombre">{{$descarga->{"nombre_".$idioma} }}</div>
			 					<div class="download"><img class="responsive-img" src="{{asset('img/generico/download.png')}}" alt=""></div>
			 				</a>
			 			</div>
		 			@endif
		 		@else
		 			<div class="col s12 m6">
		 				<a href="{{asset($descarga->{"ficha".$idioma}) }}" download="{{$descarga->{"ficha_".$idioma} }}" class="div-descarga hoverable">
		 					<div class="nombre">{{$descarga->{"nombre_".$idioma} }}</div>
		 					<div class="download"><img class="responsive-img" src="{{asset('img/generico/download.png')}}" alt=""></div>
		 				</a>
		 			</div>
 				@endif
 				
 			@endforeach
 		</article>
	</section>  
@endsection