@extends('layouts.layout2')
@section('contenido')
    <div class="login-logo">
    <a href="#"><b>Computer Store</b> INC.</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Registrate para iniciar sesion</p>

        <form action="/login" method="post">
        @csrf
        <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email">
            <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
            <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                Recuerdame
                </label>
            </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Iniciar</button>
            </div>
            <!-- /.col -->
        </div>
        </form>

        <p class="mb-0">
        <a href="{{ route('registrar.usuario') }}" class="text-center">Registrar nuevo</a>
        </p>
    </div>
    <!-- /.login-card-body -->
    </div>
@endsection
