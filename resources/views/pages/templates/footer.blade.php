
  {{-- <div style="position:  absolute; width:  100%;">
    <img src="{{asset('img/logos/fondo.png')}}" alt="" class="responsive-img" style="width:  100%;">
  </div> --}}
  <footer class="page-footer" >
      <div class="container-fluid" style="padding-top: 50px;">
        <div class="row" style="display:  flex; align-items:  center; padding-bottom: 50px;">
          <div class="col s12 m4">
            <h5 class="white-text titulo-footer">SITEMAP</h5>
            <div class="links">
              <ul>
                <li><a class="grey-text text-lighten-3" href="#!">Inicio</a></li>
                <li><a class="grey-text text-lighten-3" href="#!">Empresa</a></li>
                <li><a class="grey-text text-lighten-3" href="#!">Productos</a></li>
              </ul>
              <ul style="padding-left: 50px;">
                <li><a class="grey-text text-lighten-3" href="#!">Descargas</a></li>
                <li><a class="grey-text text-lighten-3" href="#!">Calidad</a></li>
                <li><a class="grey-text text-lighten-3" href="#!">Contacto</a></li>
              </ul>
            </div>
          </div>
          <div class="col s12 m4" style="display: flex; justify-content: center; align-items: center;">
            <img class="responsive-img" src="{{asset($logofoot->ruta)}}"  alt="">
          </div>
          <div class="col s12 m4 padding-in">
            <h5 class="white-text titulo-footer">INDUSTRIAS EPTA SRL</h5>
            <div class="row">
              <div class="col s1">
                <img src="{{asset('img/generico/ubicacion.png')}}" alt="">
              </div>
              <div class="col s11">
                {{$direccion->descripcion}}
              </div>
            </div>
            <div class="row">
              <div class="col s1">
                <img src="{{asset('img/generico/telefono.png')}}" alt="">
              </div>
              <div class="col s11">
                {{$telefono->descripcion}}
              </div>
            </div>
            <div class="row">
              <div class="col s1">
                <img src="{{asset('img/generico/correo.png')}}" alt="">
              </div>
              <div class="col s11">
                {{$mail->descripcion}}
              </div>
            </div>
          </div>
        </div>
          
    </div>
  </footer>