@extends('pages.templates.cuerpo')
@section('titulo',Lang::get('general.productos'))
@section('estilo')
  <link rel="stylesheet" href="{{ asset('css/page/subproducto.css') }}">
@endsection
@section('paginas')
<?php 
  $i=0;
  $rows=count($productos);
?>
<div class="container-fluid" style="margin: 5% 7%; position: relative;">
  <div class="row">
    <nav class="sub-breadcrumb">
      <div class="nav-wrapper">
        <div class="col s12">
          @foreach($familias as $familia)
            @if($familia->id == $seleccionada->id_familia)
              <a style="text-transform: uppercase;" href="{{route('producto',$seleccionada->id_familia)}}" class="breadcrumb">{{$familia->{"nombre_".$idioma} }}</a>
            @endif
          @endforeach
          
          <a style="text-transform: uppercase;" href="{{route('subproducto',$seleccionada->id)}}" class="breadcrumb">{{$seleccionada->{"nombre_".$idioma} }}</a>
        </div>
      </div>
    </nav>
  </div>
  <div class="row">
    <div class="col s12 m3">
      {{-- <div class="container"><a href="#" data-activates="nav-mobile" class="button-collapse top-nav full hide-on-large-only"><i class="material-icons" style="margin: 0px;">menu</i></a></div> --}}
      <ul id="nav-mobile" class="side-nav fixed" style="position: relative; box-shadow: none; display: inline;">
        @foreach($subfamilias as $subfamilia)
          <ul class="collapsible collapsible-accordion">
            <li class="bold"><a class="hover collapsible-header waves-effect waves-admin <?php if($subfamilia->id == $seleccionada->id){?> active <?php } ?>">{{$subfamilia->{"nombre_".$idioma} }}<i class="material-icons" style="margin: 0px;">expand_more</i></a>
              <div class="collapsible-body">
                <ul>
                  @foreach($productos as $producto)
                    @if($producto->id_subfamilias == $subfamilia->id)
                      <li><a class="hover producto" href="{{route("subgaleria",$producto->id)}}">{{$producto->{"nombre_".$idioma} }}</a></li>
                    @endif
                  @endforeach
                </ul>
              </div>
            </li>
          </ul>
        @endforeach
      </ul>
    </div>
    <div class="col s12 m9">
      <div class="row">
        @foreach($productos as $producto)
          @if($seleccionada->id == $producto->id_subfamilias)
          <div class="col s12 m4">
            <a href="{{route("subgaleria",$producto->id)}}" class="div-sub">
              <img class="responsive-img" src="{{asset($producto->imagen_destacada)}}" alt="">
              <div class="producto-hover"></div>
            </a>
            <div class="barra-producto">
              <p class="producto">{{$producto->{"nombre_".$idioma} }}</p>
            </div>
          </div>
          @endif
        @endforeach
      </div>
    </div>
  </div>
  
</div>
  
<script>
  // Initialize collapse button
  $(".button-collapse").sideNav();
  // Initialize collapsible (uncomment the line below if you use the dropdown variation)
  //$('.collapsible').collapsible();
</script>
@endsection