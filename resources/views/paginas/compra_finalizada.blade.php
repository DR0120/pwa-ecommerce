@extends('layouts.layout2')
@section('title', 'cheack')

@section('contenido')
<div class="content-wrapper">
    <div class="container pt-4">
        <div id="error-page" class="col-md-8 mx-auto text-center">
            <div class="box">
            <p class="text-center"><a href="index.html"><img src="https://i.pinimg.com/originals/a1/dd/7f/a1dd7ff48ce90df319e962001d56163c.gif" alt="Obaju template"></a></p>
            <h3>Gracias por su preferencia</h3>
            <h4 class="text-muted">su pedido a sido procesado con exito, en breve nos comunicamos con usted</h4>
            <p class="buttons"><a href="{{ route('inicio') }}" class="btn btn-template-outlined"><i class="fa fa-home"></i>Ir a inicio</a></p>
            </div>
        </div>
    </div>
</div>
@endsection