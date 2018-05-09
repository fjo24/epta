@extends('pages.templates.cuerpo')
@section('titulo',Lang::get('general.contacto'))
@section('estilo')
	<link rel="stylesheet" href="{{ asset('css/page/contacto.css') }}">
@endsection
@section('paginas')
	<div class="container-fluid">
		<section style="position: relative;">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3285.4630086923894!2d-58.60067788477123!3d-34.56714928046901!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb9826c18876b%3A0x16b341d4fc77ecb5!2sIndustrias+Epta+SRL!5e0!3m2!1ses!2sar!4v1520344225097" width="100%" height="460" frameborder="0" style="border:0" allowfullscreen></iframe>
			<div class="row datos hide-on-small-only">
				<section class="col m12">
					<div class="row">
						<div class="col s2"><img src="{{asset("img/generico/ubicacion1.png")}}" alt=""></div>
						<div class="col-10">
							<p>{{$direccion->descripcion}}</p>
						</div>
					</div>
					<div class="row">
						<div class="col s2"><img src="{{asset("img/generico/telefono1.png")}}" alt=""></div>
						<div class="col-10">
							<p>{{$telefono->descripcion}}</p>
						</div>
					</div>
					<div class="row">
						<div class="col s2"><img src="{{asset("img/generico/correo1.png")}}" alt=""></div>
						<div class="col-10">
							<p>{{$mail->descripcion}}</p>
						</div>
					</div>
				</section>
			</div>
		</section>
		<section class="row" style="margin: 1% 7%;">
			<div class="contacto">{{ Lang::get('general.mensajito') }}</div>
		</section>
		<section style="margin: 5% 7%;">
			<div class="row">
			    <form class="col s12" method="POST" action="{{route('mail')}}" style="padding: 0px;">
     				{{ csrf_field() }}
				    <div class="row">
				        <div class="input-field col s12 m6">
				          	<input id="nombre" name="nombre" type="text" class="validate">
				          	<label for="nombre">{{ Lang::get('general.nombre') }}</label>
				        </div>
				        <div class="input-field col s12 m6">
				          	<input id="telefono" name="telefono" type="text" class="validate">
				          	<label for="telefono">{{ Lang::get('general.telefono') }}</label>
				        </div>
				    </div>
				    <div class="row">
				      	<div class="input-field col s12 m6">
				          	<input id="empresa" name="empresa" type="text" class="validate">
				          	<label for="empresa">{{ Lang::get('general.empre') }}</label>
				        </div>
				        <div class="input-field col s12 m6">
				          	<input id="email" name="email" type="email" class="validate">
				          	<label for="email">{{ Lang::get('general.email') }}</label>
				        </div>
				    </div>
				    <div class="row">
				      	<div class="input-field col s12 m6">
				          	<textarea id="mensaje" name="mensaje" class="materialize-textarea"></textarea>
				          	<label for="mensaje">{{ Lang::get('general.mensaje') }}</label>
				        </div>
				        <div class="col s12 m6">
				    		<div class="form-group">
								<div class="g-recaptcha" data-sitekey="6LfngEoUAAAAALgOme_otP1U2h4bsJ1ABjcO59MX"></div>
							</div>
				    	</div>
				    </div>
			      	<div class="row">
		    			<div class="col s12 boton" style="padding-left: 0; padding-top: 2%;"">
		    				<input type="submit" class="btn waves-effect waves-light" value="{{ Lang::get('general.enviar') }}">
		    			</div>
		    		</div>
			    </form>
			  </div>
		</section>
	</div>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection