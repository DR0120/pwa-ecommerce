@extends('layouts.layout2')
@section('title', 'detalle-usuario')

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
                        <th>Estado</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedidos as $pedido)
                            <tr>
                                <th>{{$pedido->id}}</th>
                                <td><span class="badge badge-info">{{$pedido->estado}}</span></td>
                                <td>{{\Carbon\Carbon::parse($pedido->created_at)->format('d/m/Y')}}</td>
                                <td>${{number_format($pedido->total_pagar)}}</td>
                                <td><a href="{{ route('pedido.detalle', ['id'=>$pedido->id]) }}" class="btn btn-template-outlined btn-sm">Detalles</a></td>
                            </tr>
                        @endforeach
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-md-3 mt-4 mt-md-0">
              <!-- CUSTOMER MENU -->
              <div class="panel panel-default sidebar-menu">
                <div class="panel-heading">
                  <h3 class="h4 panel-title">Sección de clientes</h3>
                </div>
                <div class="panel-body">
                  <ul class="nav nav-pills flex-column text-sm">
                    <li class="nav-item"><a href="{{ route('pedido.mostrar') }}" class="nav-link"><i class="fa fa-list"></i> Mis ordenes</a></li>
                    <li class="nav-item"><a href="{{ route('favoritos.index', ['id'=>Auth::id()]) }}" class="nav-link"><i class="fa fa-heart"></i> Mi lista de deseos</a></li>
                    <li class="nav-item"><a href="customer-account.html" class="nav-link"><i class="fa fa-user"></i> Mi cuenta</a></li>
                    <li class="nav-item"><a href="{{ route('salir') }}" class="nav-link"><i class="fa fa-sign-out"></i> Cerrar sesión</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection