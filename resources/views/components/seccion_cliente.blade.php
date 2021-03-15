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