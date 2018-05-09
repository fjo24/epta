<header>
  
  <ul id="dropdown1" class="dropdown-content dropdown-content-mine">
    @foreach($familias as $familia)
      <li><a href="{{route('producto',$familia->id)}}">{{$familia->{"nombre_".$idioma} }}</a></li>
      <li class="divider"></li>
    @endforeach
  </ul>
  <ul id="dropdown" class="dropdown-content">
    @foreach($familias as $familia)
      <li><a href="{{route('producto',$familia->id)}}">{{$familia->{"nombre_".$idioma} }}</a></li>
      <li class="divider"></li>
    @endforeach
  </ul>
  <ul id="dropdown3" class="dropdown-content dropdown-content-mine" >
    <li><a href="#!">Portugues</a></li>
    <li class="divider"></li>
    <li><a href="#!">Ingles</a></li>
  </ul>

  <nav class="header">
    <div class="nav-wrapper">
      <a href="{{route('index')}}" class="brand-logo"><img class="responsive-img logo" src="{{asset($logohead->ruta)}}" alt=""></a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons li-ppal">menu</i></a>
      <div class="cont">
        <ul class="right hide-on-med-and-down">
          <li class="li-hover"><a class="{{ Request::segment(1) === 'empresa' ? 'active-ppal' : null }} li-ppal" href="{{route('empresa')}}">{{ Lang::get('general.empresa') }}</a></li>
          @if($metadatos->seccion == 'producto')
            <li class="li-hover"><a class="active-ppal dropdown-button1 li-ppal" href="" data-activates="dropdown1">{{ Lang::get('general.productos') }}</a></li>
          @else
            <li class="li-hover"><a class="dropdown-button1 li-ppal" href="" data-activates="dropdown1">Productos</a></li>
          @endif
          
          <li class="li-hover"><a class="{{ Request::segment(1) === 'descargas' ? 'active-ppal' : null }} li-ppal" href="{{route('descargas')}}">{{ Lang::get('general.descargas') }}</a></li>
          <li class="li-hover"><a class="{{ Request::segment(1) === 'calidad' ? 'active-ppal' : null }} li-ppal" href="{{route('calidad')}}">{{ Lang::get('general.calidad') }}</a></li>
          <li class="li-hover"><a class="{{ Request::segment(1) === 'contacto' ? 'active-ppal' : null }} li-ppal" href="{{route('contacto')}}">{{ Lang::get('general.contacto') }}</a></li>
          <li class="language"><div class="idioma">
            <a style="cursor: pointer; display: flex; justify-content: center; align-items: center;" class="icon-i">{{ Config::get('app.locale') }}</a>
            <div class="idiomas">
                @if(Config::get('app.locale') != 'es')
                <a href="{{ url('idioma/es') }}" class="icon-i" style="display: flex; justify-content: center; align-items: center;">{{ Lang::get('general.español') }}</a>
                @endif
                @if(Config::get('app.locale') != 'pt')
                <a href="{{ url('idioma/pt') }}" class="icon-i" style="display: flex; justify-content: center; align-items: center;">{{ Lang::get('general.portugues') }}</a>
                @endif
                @if(Config::get('app.locale') != 'en')
                <a href="{{ url('idioma/en') }}" class="icon-i" style="display: flex; justify-content: center; align-items: center;">{{ Lang::get('general.ingles') }}</a>
                @endif
            </div>
        </div></li>
          <li>
            {!!  Form::open(['route' => 'buscar', 'method' => 'POST', 'id'=>'buscador']) !!}
      <input type="search" id="buscar" name="buscar">
    {!! Form::close() !!}  
          </li>
        </ul>


      </div>
      
      <ul class="side-nav" id="mobile-demo">
        <li><a href="{{route('empresa')}}">{{ Lang::get('general.empresa') }}</a></li>
        <li><a class="dropdown-button" href="#!" data-activates="dropdown">{{ Lang::get('general.productos') }}</a></li>
        <li><a href="{{route('descargas')}}">{{ Lang::get('general.descargas') }}</a></li>
        <li><a href="{{route('calidad')}}">{{ Lang::get('general.calidad') }}</a></li>
        <li><a href="{{route('contacto')}}">{{ Lang::get('general.contacto') }}</a></li>
      </ul>
    </div>
  </nav>   
</header>