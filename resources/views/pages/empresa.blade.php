@extends('pages.templates.cuerpo')
@section('titulo', Lang::get('general.empresa'))
@section('estilo')
	<link rel="stylesheet" href="{{ asset('css/page/empresa.css') }}">
@endsection

@section('paginas')
	<div class="container-fluid">
		<div class="cabecera">
			<img class="responsive-img" src="{{asset($nuestra->imagen_cabecera)}}" width="100%;" alt="">
			<div class="titulo-cabecera">{!!$nuestra->{"titulo_".$idioma} !!}</div>
		</div>
		<div class="row" style="margin: 5% 7%;">
			<div class="col s12 m6 titulo-empresa">
				<p class="barra">{{ Lang::get('general.nuestra') }}</p>
				<div class="contenido-empr">
					{!!$nuestra->{"contenido_".$idioma} !!}
				</div>
			</div>
			<div class="col s12 m6">
				<img class="responsive-img" src="{{asset($nuestra->imagen)}}" alt="">
			</div>
		</div>
		<div class="row mision">
			<div class="col s12 m6" style="padding: 0px;">
				<img style="width: 100%;" class="responsive-img" src="{{asset($mision->imagen)}}" alt="">
			</div>
			<div class="col s12 m6 padding-mision">
				<div class="titulo-mision">
					{!!$mision->{"titulo_".$idioma} !!}
				</div>
				<div class="contenido-mision">
					{!!$mision->{"contenido_".$idioma} !!}
				</div>
			</div>
		</div>
	</div>
@endsection