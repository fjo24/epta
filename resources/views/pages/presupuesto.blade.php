@extends('pages.templates.cuerpo')
@section('titulo', 'Solicitud de presupuesto')
@section('estilo')
	
	<link rel="stylesheet" type="text/css" href="{{ asset('css/page/russo-styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/page/presupuesto.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
@endsection

@section('paginas')
@include('flash::message')
    @if(count($errors) > 0)
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif    
<section class="main" >
    <div class="container">
            <div class="row">
                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 main-cont presupuesto center" style="float: initial">  
                   <div class="cont-pasos table">
                    
                      <div class="paso datos active col-xs-12 col-sm-2 col-md-2 col-lg-2 col-md-offset-1" id="elDiv1">
                          <span></span>
                          <p class="fuenteRC">TUS DATOS</p>
                          <div class="linea-t"></div>
                      </div>
                      <div class="linea col-xs-12 col-sm-3 col-md-3 col-lg-3 re-padding">
                          <hr class="hidden-xs" style="margin-top: 60px;">
                      </div>
                      <div class="paso obra col-xs-12 col-sm-4 col-md-4 col-lg-4" id="elDiv2">
                          <span></span>
                          <p class="fuenteRC">TU PIEZA</p>
                          <div class="linea-t"></div>
                      </div>
                  </div>
                  
                  <form action="{{route('enviar_presupuesto')}}" method="post" enctype="multipart/form-data" >
                  {{ csrf_field() }}
            <div id="estado1">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6  pasos paso-1">
                    <p>
                        <input type="text" name="nombre" id="nombre" class="form-control" value="" placeholder="Nombre"  title="" required>
                    </p>
                    <p>
                        <input type="text" name="mail" id="mail" class="form-control" value="" placeholder="E-mail" title="" required>
                    </p>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pasos paso-1">
                    <p>
                        <input type="text" name="localidad" id="est" class="form-control" value="" placeholder="Localidad"  title="">
                    </p>
                    <p>
                        <input type="text" name="tel" id="tel" class="form-control" value="" placeholder="Teléfono" title="">
                    </p>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 cont-btn">
                    <!-- <a href="presupuesto.php">Paso anterior</a> -->
                    <button type="button" class="btn btn-default pull-right anima2 boton-siguiente" id="botonSiguienteEstado">Siguiente</button>
                </div>
            </div>
            
            <div id="estado2" style="display: none;">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pasos paso-2">
                    <p>
                        <textarea name="detalle" id="detalle" placeholder="Detalles" class="form-control" rows="6" style="height: 90px;"></textarea>
                    </p>
                    
                </div>
                
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pasos paso-2" style="margin-bottom: 40px">
                    <p>
                        <input type="text" name="plano" id="plano" placeholder="Plano (opcional)" class="form-control" value="" title="">
                    </p>
                    <div class="examinar">
                        <div class="input-group">

                        <label id="plano" class="col-xs-10 form-control plano-margen opcional" style="width: 50%;color: rgba(85,85,85,0.64);">... </label>
                     <!--      <input type="text" name="plano" id="plano" placeholder="Plano (opcional)"  class="col-xs-10 form-control plano-margen" style="">-->
                            <label class="input-group-btn" style="margin-top: 10px;">
                                <span class="btn-exam ">
                                    <input type="file" style="display: none;" name="archivo" id="archivo" multiple="">
                                    Examinar
                                </span>
                            </label>
                            
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 cont-btn">
                    <button type="submit" class="btn btn-default pull-right anima2 boton-enviar fuenteRC">Enviar</button>
                    <button type="button" class="btn btn-default pull-right anima2 boton-atras fuenteRC" id="botonEstadoAnterior">Anterior</button>
                </div>
            </div>
            
            </form>
                   
                 </div>
            </div>
          </div> 
          
         </section> 
<script src="http://code.jquery.com/jquery-latest.min.js"></script> <!-- llamado a jQuery -->
<script src="js/bootstrap.min.js"></script> <!-- llamado a js de BOOTSTRAP que trabaja con Jquery es por eso que se pone debajo del jQuery.js -->

<script>
    
    document.getElementById("botonSiguienteEstado").addEventListener("click", mostrarEstado2);
    document.getElementById("botonEstadoAnterior").addEventListener("click", mostrarEstado1);

    function mostrarEstado2() {
        document.getElementById("estado1").className = "animated bounceOutLeft";
        setTimeout(function(){ 
            document.getElementById("estado1").style.display = "none"; 
            document.getElementById("estado2").style.display = "block";
            document.getElementById("estado2").className = "animated bounceInRight";
            
            document.getElementById("elDiv1").className = "paso datos col-xs-12 col-sm-2 col-md-2 col-lg-2 col-md-offset-1";
            document.getElementById("elDiv2").className = "paso obra active col-xs-12 col-sm-4 col-md-4 col-lg-4";
        }, 1000);

    }
    
    function mostrarEstado1() {
        document.getElementById("estado2").className = "animated bounceOutLeft";
        
        setTimeout(function(){ 
            document.getElementById("estado2").style.display = "none"; 
            document.getElementById("estado1").style.display = "block";
            document.getElementById("estado1").className = "animated bounceInRight";
            
            document.getElementById("elDiv1").className = "paso datos active col-xs-12 col-sm-2 col-md-2 col-lg-2 col-md-offset-1";
            document.getElementById("elDiv2").className = "paso obra col-xs-12 col-sm-4 col-md-4 col-lg-4";
        }, 1000);
    }
    
    function animacion(id, clase) {
        $(id).removeClass("animated "+clase).addClass(clase + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
          $(this).removeClass("animated "+clase);
        });
    };
    document.getElementById('archivo').onchange = function () {
      console.log(this.value);
      document.getElementById('plano').innerHTML = document.getElementById('archivo').files[0].name;
    }
</script> 
@endsection