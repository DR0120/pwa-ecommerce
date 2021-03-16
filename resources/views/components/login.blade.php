<a class="nav-link" data-toggle="dropdown" href="#">
  <i class="fas fa-user"></i>
  <span>Iniciar Sesion</span>
</a>
<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
  <div class="card-body login-card-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="/login" method="post">
      @csrf
      <div class="input-group mb-3">
        <input name="email" type="email" class="form-control" placeholder="Email">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-envelope"></span>
          </div>
        </div>
      </div>
      <div class="input-group mb-3">
        <input name="password" type="password" class="form-control" placeholder="Password">
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
              Remember Me
            </label>
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary btn-block">Sign In</button>
    </form>
    <p class="mb-1">
      <a href="forgot-password.html">I forgot my password</a>
    </p>
    <p class="mb-0">
      <a href="{{ route('registrar.usuario') }}" class="text-center">Registrar nuevo usuario</a>
    </p>
  </div>
</div>