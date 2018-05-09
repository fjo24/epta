@extends('pages.templates.cuerpo')
@section('titulo', 'EPTA - Home')
@section('estilo')
	<link rel="stylesheet" href="{{ asset('css/page/slider.css') }}">
	<link rel="stylesheet" href="{{ asset('css/page/home.css') }}">
@endsection

@section('paginas')
	<div class="container-fluid">
		<div id="carousel" class="carousel carousel-slider center" data-indicators="true">
		    @foreach($sliders as $slider)
			    <div class="carousel-item white-text" href="">
			      <img src="{{asset($slider->imagen)}}" alt="">
			    </div>
			    <div class="cont-titulos">
			    	<div class="titulo-slider ">{!!$slider->{"texto_".$idioma} !!}</div>
			    	<div class="subtitulo-slider ">{!!$slider->{"subtitulo_".$idioma} !!}</div>
			    </div>
			    
			    <div class="expand"><a href="#empresa"><i class="material-icons hide-on-small-only" style="color:white;">expand_more</i></a></div>
		    @endforeach
		</div>	
		<div style="margin: 0px 7%;">
			<div class="row">
				<?php 
					$i=0;
				?>
				@foreach($productos as $producto)
					@if($i==2)
						<div class="col s12">
							<div class="div-product">
								<img style="width: 100%;" class="responsive-img" src="{{asset($producto->imagen)}}" alt="">
								<div class="div-nombre">{!!$producto->{"nombre_".$idioma} !!}</div>
							</div>
							
						</div>
						<?php 
							$i=0;
						?>
					@else
						<div class="col s12 m6" style="margin-top: 4%;">
							<div class="div-product">
								<img class="responsive-img" src="{{asset($producto->imagen)}}" alt="">
								<div class="div-nombre">{!!$producto->{"nombre_".$idioma} !!}</div>
								<?php
									$i++;
								?>
							</div>
							
						</div>
					@endif
				@endforeach
			</div>
		</div>
		<div class="row contenido">
			<div class="titulo-contenido">
				{!!$home->{"titulo_".$idioma} !!}
			</div>
			<div class="subtitulo-contenido">
				{!!$home->{"subtitulo_".$idioma} !!}
			</div>
			<div class="contenido-contenido">
				{!!$home->{"contenido_".$idioma} !!}
			</div>
			<div>
				<center><a href="{{$home->link}}" class="boton">
					<p>CONOCÉ MÁS</p>
				</a></center>
			</div>
		</div>
	</div>
@endsection