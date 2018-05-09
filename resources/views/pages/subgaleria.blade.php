@extends('pages.templates.cuerpo')
@section('titulo',Lang::get('general.productos').' - '.$producto->{"nombre_".$idioma} )
@section('estilo')
  <link rel="stylesheet" href="{{ asset('css/page/subproducto.css') }}">
 
@endsection
@section('paginas')
  <div class="container-fluid" style="margin: 5% 7%;">
    <div class="row">
      <nav class="sub-breadcrumb">
        <div class="nav-wrapper">
          <div class="col s12">
            <a style="text-transform: uppercase;" href="{{route('producto',$familia2->id)}}" class="breadcrumb">{{$familia2->{"nombre_".$idioma} }}</a>
            <a style="text-transform: uppercase;" href="{{route('subproducto',$subfamilia->id)}}" class="breadcrumb">{{$subfamilia->{"nombre_".$idioma} }}</a>
            <a style="text-transform: uppercase;" href="{{route('subproducto',$producto->id)}}" class="breadcrumb">{{$producto->{"nombre_".$idioma} }}</a>
          </div>
        </div>
      </nav>
    </div>
    <div class="row">
      <div class="col s12 m6">
        <div class="row">
          <div class="col s12" style="padding-left: 0px;">
            <?php $i=0; ?>
            @foreach($imagenes as $imagen)
              @if($i==0)
              <div class="cont-img">
                <img class="responsive-img" id="producto" src="{{asset($imagen->imagen)}}" alt="">
                <?php $i++; ?>
              </div>
              
              @endif
            @endforeach
          </div>
        </div>
        <div class="row">
          @foreach($imagenes as $imagen)
            <div class="col s4 m2"  style="padding-left: 0px;">
                <div class="cont-img">
                  <img class="responsive-img" src="{{asset($imagen->imagen)}}" alt="" onclick="actualizar('{{asset($imagen->imagen)}}')">
                </div>
            </div>
          @endforeach
        </div>
      </div>
      <article class="col s12 m6">
        <p class="titulo-galeria">{{$producto->{"nombre_".$idioma} }}</p>
        <p style="font-weight: 700; font-family: 'Source Sans Pro', sans-serif; color: #333333;">
          <div style="font-family: 'Source Sans Pro', sans-serif; color: #333333; font-weight: 700; font-size: 17px;">
            {{ Lang::get('general.descripcion') }}
          </div>
        </p>
        <div class="row">
          {!!$producto->{"contenido_".$idioma} !!}
        </div>
        <section>
            {!!$producto->tabla !!}
        </section>
        <div class="row" style="margin-bottom: 0px;">
          <div class="col s12 boton" style="padding-left: 0; padding-top: 2%;"">
            <a href="{{asset($producto->{"descarga_".$idioma} )}}" download="" class="btn waves-effect waves-light galeria">
              {{ Lang::get('general.descarga') }}
            </a>
            <div><p class="codigo">CÓDIGO:</p> {!!$producto->codigo1 !!}</div>
          </div>
        </div>
        <div class="row" style="margin-bottom: 0px;">
          <div class="col s12 boton" style="padding-left: 0; padding-top: 2%;"">
            <a href="{{asset($producto->{"descarga_".$idioma} )}}" download="" class="btn waves-effect waves-light galeria">
              {{ Lang::get('general.solucion') }}
            </a>
            <div><p class="codigo">CÓDIGO:</p> {!!$producto->codigo2 !!}</div>
          </div>
        </div>
      </article>

    </div>
  </div>
  <script>
    function actualizar(imagen){
      document.getElementById('producto').src = imagen;
    }
  </script>
@endsection