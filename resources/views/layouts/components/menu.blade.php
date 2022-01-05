<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SIS ACAD</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          @auth
          <a href="#" class="d-block"> {{ Auth::user()->email }} </a>
            
          @endauth
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                ADMINISTRACIÓN
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('administracion') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>INICIO</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                GESTIÓN PERSONA
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('persona.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>NUEVA PERSONA</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('persona.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>LISTA PERSONA</p>
                </a>
              </li>
              
            </ul>
          </li>
          @if(Auth::user()->role == 'docente')
          <li class="nav-item">
            <a href="{{ route('carrera.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                GESTIÓN CARRERAS
                <!--span class="right badge badge-danger">New</span-->
              </p>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a href="{{ route('periodo.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                PERIODO - GESTION
                <!--span class="right badge badge-danger">New</span-->
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>