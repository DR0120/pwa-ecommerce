@extends('layouts.layout2')
@section('title', 'detalle-usuario')

@section('contenido')
<div class="content-wrapper">
    <div id="content">
        <div class="container pt-4">
          <div class="row bar mb-0">
            <div id="customer-orders" class="col-md-9">
                <h1>Lista de favoritos</h1>
              <p class="text-muted lead">Bienvenido a su lista de deseos. A continuación se muestran todos sus productos favoritos.</p>
              <div class="box mt-0 mb-lg-0">
                <div class="album py-5 bg-light">
                    <div class="row">
                        @foreach ($favoritos as $favorito)
                            @foreach ($productos as $producto)
                                @if ($favorito->producto_id == $producto->id)
                                    @include('components.product_card')  
                                    @break 
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                </div>   
              </div>
            </div>
            @include('components.seccion_cliente')
          </div>
        </div>
      </div>
</div>
@endsection