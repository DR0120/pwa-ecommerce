@extends('layouts.layout2')

@section('css')
  <style>
    /* html, body {
      height: 100%;
      margin: 0;
      padding: 0;
    } */
    #map {
      width: 100%;
      height: 400px;
    }
    #coords{width: 100%;}
  </style>
@endsection

@section('contenido')
<div class="content-wrapper">
    <div class="container pt-4">
        <div class="row">
          <div id="checkout" class="col-lg-9">
            <div class="box border-bottom-0">
              <form method="post" action="{{ route('venta') }}">
                @csrf
                <div class="content">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="firstname">Nombre</label>
                        <input id="firstname" type="text" class="form-control" name="nombre" value={{ Auth::user()->name }}>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="lastname">Apellido</label>
                        <input id="lastname" type="text" class="form-control" name="apellido" value={{ Auth::user()->apellido }}>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label for="city">C.I.</label>
                        <input id="city" type="text" class="form-control" name="ci" value={{ Auth::user()->nro_documento }}>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label for="zip">Direccion</label>
                        <input id="zip" type="text" class="form-control" name="direccion">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label for="state">Calle</label>
                        <input id="state" class="form-control" name="calle">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label for="country">Numero casa/domicilio</label>
                        <input id="country" class="form-control" name="nro_casa">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="phone">Teléfono</label>
                        <input id="phone" type="text" class="form-control" name="telefono" value={{ Auth::user()->telefono }}>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input id="email" type="text" class="form-control" name="email" value={{ Auth::user()->email }}>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="lastname">Marque su direccion en el mapa</label>
                  <div id="map"></div>
                  <input type="hidden" id="lat" name="lat"/>
                  <input type="hidden" id="lon" name="lon"/>
                </div>
                <div class="box-footer d-flex flex-wrap align-items-center justify-content-between">
                  <div class="left-col"><a href="{{ route('carrito.mostrar') }}" class="btn btn-secondary mt-0"><i class="fa fa-chevron-left"></i>Volver a carrito</a></div>
                  <div class="right-col">
                    <button type="submit" class="btn btn-info">Confirmar pedido<i class="fa fa-chevron-right"></i></button>
                  </div>
                </div>
              </form>
            </div>
          </div>    
               
          @include('components.carritosubtotal')
        </div>
      </div>
</div>
@endsection

@section('js')
<script>
  var marker;          //variable del marcador
  var coords = {};    //coordenadas obtenidas con la geolocalización
  
  //Funcion principal
  initMap = function () 
  {
//usamos la API para geolocalizar el usuario
    navigator.geolocation.getCurrentPosition(
      function (position){
        coords =  {
          lng: position.coords.longitude,
          lat: position.coords.latitude
        };
        setMapa(coords);  //pasamos las coordenadas al metodo para crear el mapa
        
        
      },function(error){console.log(error);});
  }

  function setMapa (coords)
  {   
    //Se crea una nueva instancia del objeto mapa
    var map = new google.maps.Map(document.getElementById('map'),
    {
      zoom: 15,
      center:new google.maps.LatLng(coords.lat,coords.lng),

    });

    //Creamos el marcador en el mapa con sus propiedades
    //para nuestro obetivo tenemos que poner el atributo draggable en true
    //position pondremos las mismas coordenas que obtuvimos en la geolocalización
    marker = new google.maps.Marker({
      map: map,
      draggable: true,
      animation: google.maps.Animation.DROP,
      position: new google.maps.LatLng(coords.lat,coords.lng),

    });
    //agregamos un evento al marcador junto con la funcion callback al igual que el evento dragend que indica 
    //cuando el usuario a soltado el marcador
    marker.addListener('click', toggleBounce);
    
    marker.addListener( 'dragend', function (event)
    {
      //escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
      document.getElementById("lat").value = this.getPosition().lat();
      document.getElementById("lon").value = this.getPosition().lng();
    });
  }
  
  //callback al hacer clic en el marcador lo que hace es quitar y poner la animacion BOUNCE
  function toggleBounce() {
    if (marker.getAnimation() !== null) {
      marker.setAnimation(null);
    } else {
      marker.setAnimation(google.maps.Animation.BOUNCE);
    }
  }
  
  // Carga de la libreria de google maps 
  
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?callback=initMap"></script>
@endsection