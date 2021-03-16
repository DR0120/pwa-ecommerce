<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-dark navbar-cyan">
    <div class="container">
      {{-- <a href="/" class="navbar-brand">
        <h2 class="brand-text font-weight-light">Giga-net Inc.</h2>
      </a> --}}
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          {{-- <li class="nav-item">
            <a href="{{ route('inicio') }}" class="nav-link">Inicio</a>
          </li> --}}
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Catalogo</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="{{ route('productos.agregados_recientemente') }}" class="dropdown-item">Agregados recientemente</a></li>
              <li><a href="#" class="dropdown-item">Mas vendidos</a></li>
              <li><a href="{{ route('productos.en_oferta') }}" class="dropdown-item">En oferta</a></li>

              <li class="dropdown-divider"></li>

              <!-- Level two dropdown-->
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Categorias</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  @foreach ($categorias as $categoria)
                    <li>
                        <a tabindex="-1" href={{ route('productos.catalogo.categoria', ['categoria'=>$categoria->id,]) }} class="dropdown-item">{{$categoria['nombre']}}</a>
                    </li>
                  @endforeach
                </ul>
              </li>
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Marcas</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  @foreach ($marcas as $marca)
                    <li>
                        <a tabindex="-1" href={{ route('productos.catalogo.marca', ['marca'=>$marca->id]) }} class="dropdown-item">{{$marca['nombre']}}</a>
                    </li>
                  @endforeach
                </ul>
              </li>
              <li><a href="" class="dropdown-item">Ver todo</a></li>
              <!-- End Level two -->
            </ul>
          </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-0 ml-md-3" action="{{ route('productos.buscar') }}">
          @csrf 
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" name="buscar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
          <!-- Authentication Links -->
        @guest
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
            <i class="fas fa-shopping-cart"></i>
            <span class="badge badge-danger navbar-badge">{{count(Cart::getContent())}}</span>
          </a>
        </li>
        @include('components.login')
        @else
          {{-- <li class="nav-item">
            <a href="{{ route('favoritos.index', ['id'=>Auth::id()]) }}" class="nav-link">favoritos</a>
          </li> --}}
          <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
              <i class="fas fa-shopping-cart"></i>
              <span class="badge badge-danger navbar-badge">{{count(Cart::getContent())}}</span>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">{{ Auth::user()->name }}</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="{{ route('pedido.mostrar') }}" class="dropdown-item"><i class="fas fa-user"></i> Ver mis pedidos </a></li>
              <li><a href="{{ route('salir') }}" class="dropdown-item"><i class="fas fa-bell"></i> Salir </a></li>
            </ul>
          </li>
        @endguest
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

@include('components.carrito')  

@include('notificacion')