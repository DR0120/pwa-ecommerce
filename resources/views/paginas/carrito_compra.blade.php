@extends('layouts.layout2')
@section('title', 'marcas')

@section('css')
@endsection

@section('contenido')
<div class="content-wrapper">
    <div id="content">
        <div class="container pt-4">
        <div class="row bar">
            <div class="col-lg-12">
            <p class="text-muted lead"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Actualmente tiene {{count(Cart::getContent())}} artículos en su carrito.</font></font></p>
            </div>
            <div id="basket" class="col-lg-9">
            <div class="box mt-0 pb-4 no-horizontal-padding">
                <form method="get" action="shop-checkout1.html">
                <div class="table-responsive">
                    <table class="table">
                    <thead>
                        <tr>
                            <th colspan="2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Producto</font></font></th>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cantidad</font></font></th>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Precio unitario</font></font></th>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Descuento</font></font></th>
                            <th colspan="2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Total</font></font></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (Cart::getContent() as $item)
                            <tr>
                                <td><a href="#"><img src="/inventario/img/{{$item->attributes->imagen}}" alt="{{$item->nombre}}" class="img-fluid"></a></td>
                                <td><a href="{{ route('productos.mostrar', ['id'=>$item->id]) }}"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$item->name}}</font></font></a></td>
                                <td>
                                    <form action="{{route('cart.update')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="producto_id" value="{{$item->id}}">
                                        <input type="number" name="cantidad" class="form-control" value="{{$item->quantity}}">
                                    </form>    
                                </td>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$ {{number_format($item->price)}}</font></font></td>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                    $ {{number_format($item->price * ($item->attributes->descuento / 100))}}</font></font></td>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                    $ {{number_format(($item->price - ($item->price * ($item->attributes->descuento / 100))) * $item->quantity)}}</font></font></td>
                                <td>
                                    <form action="{{route('cart.removeitem')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$item->id}}">
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                        <th colspan="5"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" id="cantidad">Total</font></font></th>
                        <th colspan="2"><font style="vertical-align: inherit;"><font id="total" style="vertical-align: inherit;">${{number_format(Cart::getSubTotal())}}</font></font></th>
                        </tr>
                    </tfoot>
                    </table>
                </div>
                <div class="box-footer d-flex justify-content-between align-items-center">
                    <div class="left-col"><a href="{{ route('inicio') }}" class="btn btn-secondary mt-0"><i class="fa fa-chevron-left"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Seguir comprando</font></font></a></div>
                    <div class="left-col"><a href="{{ route('carrito.check') }}" class="btn btn-info mt-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Pasar por caja<i class="fa fa-chevron-right"></i></font></font></a></div>
                </div>
                </form>
            </div>
            </div>
            @include('components.carritosubtotal')
        </div>
        </div>
    </div>
</div>
@endsection    
@section('js')
    <script>
        $( document ).ready(function() {
            $( "#cantidad" ).click(function( event ) {
            console.log('hola');
        });
        });
    </script>
@endsection