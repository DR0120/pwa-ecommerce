@extends('layouts.layout2')
@section('title', 'cheack')

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