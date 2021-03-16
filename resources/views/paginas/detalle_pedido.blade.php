@extends('layouts.layout2')

@section('contenido')
<div class="content-wrapper">
    <div id="content">
        <div class="container pt-4">
          <div class="row bar mb-0">
            <div id="customer-orders" class="col-md-9">
              <p class="text-muted lead">Si tiene alguna pregunta, no dude en <a href="contact.html">Contactarnos</a>, nuestro centro de servicio al cliente está trabajando para usted las 24 horas del día, los 7 días de la semana.</p>
              <div class="box mt-0 mb-lg-0">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Nro Pedido</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Descuento</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($detalles as $detalle)
                            <tr>
                                <td>{{$detalle->pedido_id}}</td>
                                <th>{{$detalle->producto_nombre}}</th>
                                <td>{{$detalle->cantidad}}</td>
                                <td>${{number_format($detalle->precio)}}</td>
                                <td>${{number_format($detalle->descuento)}}</td>
                            </tr>
                        @endforeach
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            @include('components.seccion_cliente')
          </div>
        </div>
      </div>
</div>
@endsection