@extends('layouts.layout2')

@section('contenido')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content">
    <!-- Default box -->
    <div class="card card-solid">
      <div class="card-body">
        <div class="row">
          <div class="col-sm-6">
            <div class="col-12" align="center" id="imgPrincipal">
              <img class="img-fluid" src="/inventario/img/{{$producto['imagen']}}" alt="Product Image">
            </div>
            <div class="product-image-thumbs">
                @foreach ($producto->imagenes as $imagen)
                  <div class="product-image-thumb" ><img src="/inventario/img/{{$imagen}}" onclick="cambiarImagen('{{$imagen}}')"></div>
                @endforeach
            </div>
          </div>
          <div class="col-sm-6">
            <h1>{{$producto['nombre']}}</h1>
            <span class="text-muted">cod:{{$producto->cod}}</span>
            <h4 class="bg-success col-3 text-center">Disponible</h4>
            <div class="row">
              @if ($producto->oferta_id != 1)
                <h1 class="text-danger">
                  ${{number_format($producto['precio_venta'] - ($producto['precio_venta'] * ($producto->oferta / 100)))}}  
                  <h2 class="text-muted"><strike align="right">${{$producto['precio_venta']}}</strike></h2>
                </h1>
              @else
                <h1 class="text-success">${{number_format($producto['precio_venta'])}}</h1>
              @endif
            </div>
            <p>{{$producto['descripcion']}}</p>

            <hr>
            <form action="{{route('cart.add')}}" method="post">
            <dt>Ingrese una cantidad:</dt>
            <div class="col-3">
              <input type="number" name="cantidad" value=1>
            </div>

            <div class="mt-4">
              
                @csrf
                <input type="hidden" name="producto_id" value="{{$producto->id}}">
                <input type="submit" name="btn" class="btn btn-info btn-lg" value="A??adir a Carrito">
              
              <a href="{{ route('favoritos.agregar', ['id'=>$producto->id]) }}">
                <div class="btn btn-default btn-lg">
                  A??adir a favoritos
                </div>
              </a>
              
              
            </div>
          </form>
            <div class="mt-4 product-share">
              <a href="#" class="text-gray">
                <i class="fab fa-facebook-square fa-2x"></i>
              </a>
              <a href="#" class="text-gray">
                <i class="fab fa-twitter-square fa-2x"></i>
              </a>
              <a href="#" class="text-gray">
                <i class="fas fa-envelope-square fa-2x"></i>
              </a>
              <a href="#" class="text-gray">
                <i class="fas fa-rss-square fa-2x"></i>
              </a>
            </div>

          </div>
        </div>
        
        {{-- <div class="row mt-4">
          <nav class="w-100">
            <div class="nav nav-tabs" id="product-tab" role="tablist">
              <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Descripcion</a>
              <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comentario</a>
              <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
            </div>
          </nav>
          <div class="tab-content p-3" id="nav-tabContent">
            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae condimentum erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed posuere, purus at efficitur hendrerit, augue elit lacinia arcu, a eleifend sem elit et nunc. Sed rutrum vestibulum est, sit amet cursus dolor fermentum vel. Suspendisse mi nibh, congue et ante et, commodo mattis lacus. Duis varius finibus purus sed venenatis. Vivamus varius metus quam, id dapibus velit mattis eu. Praesent et semper risus. Vestibulum erat erat, condimentum at elit at, bibendum placerat orci. Nullam gravida velit mauris, in pellentesque urna pellentesque viverra. Nullam non pellentesque justo, et ultricies neque. Praesent vel metus rutrum, tempus erat a, rutrum ante. Quisque interdum efficitur nunc vitae consectetur. Suspendisse venenatis, tortor non convallis interdum, urna mi molestie eros, vel tempor justo lacus ac justo. Fusce id enim a erat fringilla sollicitudin ultrices vel metus. </div>
            <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui. Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum. </div>
            <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div>
          </div>
        </div> --}}
        <div class="content">
          <div class="album py-5">
            <h1>Productos relacionados</h1>
            <div class="row" align="center">
              @foreach ($productos as $producto)
                @include('components.product_card')
              @endforeach
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
</section>
@endsection
@section('js')
  <script>
    function cambiarImagen(imagen){
      console.log(imagen);
      document.getElementById('imgPrincipal').innerHTML = '<img class="img-fluid" src="/inventario/img/'+imagen+'" alt="Product Image">'
    }  
    function a??adirCarrito(id_producto){
      console.log('el producto '+ id_producto + ' a sido a??adido a carrito');
    }
  </script>
@endsection