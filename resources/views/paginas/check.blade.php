@extends('layouts.layout2')
@section('title', 'marcas')

@section('css')
@endsection

@section('contenido')
<div class="content-wrapper">
    <div class="container pt-4">
        <div class="row">
          <div id="checkout" class="col-lg-9">
            <div class="box border-bottom-0">
              <form method="post" action="{{ route('carrito.venta') }}">
                @csrf
                <div class="content">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="firstname"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre</font></font></label>
                        <input id="firstname" type="text" class="form-control" name="nombre">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="lastname"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Apellido</font></font></label>
                        <input id="lastname" type="text" class="form-control" name="apellido">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="company"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Carnet de Identidad</font></font></label>
                        <input id="company" type="text" class="form-control" name="ci">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="street"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">calle</font></font></label>
                        <input id="street" type="text" class="form-control" name="calle">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label for="city"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ciudad</font></font></label>
                        <input id="city" type="text" class="form-control" name="ciudad">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label for="zip"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">CÓDIGO POSTAL</font></font></label>
                        <input id="zip" type="text" class="form-control" name="codigo-postal">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label for="state"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Expresar</font></font></label>
                        <select id="state" class="form-control"></select>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label for="country"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">País</font></font></label>
                        <select id="country" class="form-control"></select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="phone"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Teléfono</font></font></label>
                        <input id="phone" type="text" class="form-control" name="telefono">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="email"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Correo electrónico</font></font></label>
                        <input id="email" type="text" class="form-control" name="email">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="box-footer d-flex flex-wrap align-items-center justify-content-between">
                  <div class="left-col"><a href="{{ route('carrito.mostrar') }}" class="btn btn-secondary mt-0"><i class="fa fa-chevron-left"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Volver a carrito</font></font></a></div>
                  <div class="right-col">
                    <button type="submit" class="btn btn-info"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Confirmar pedido</font></font><i class="fa fa-chevron-right"></i></button>
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