<ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
  <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
  <li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::segment(1) == '' ? 'active' : '' }}">
      <i class="nav-icon fas fa-tachometer-alt"></i>
      <p>
        Dashboard
      </p>
    </a>
  </li>
  <li class="nav-item has-treeview {{ Request::segment(1) == 'suratmasuk' ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::segment(1) == 'suratmasuk' ? 'active' : '' }}">
      <i class="nav-icon fas fa-envelope"></i>
      <p>
        Surat Masuk
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ route('daftar-surat-masuk') }}" class="nav-link {{ (Request::segment(1) == 'suratmasuk' && Request::segment(2) == 'daftar') ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>Daftar</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('input-surat-masuk') }}" class="nav-link {{ (Request::segment(1) == 'suratmasuk' && Request::segment(2) == 'input') ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>Input</p>
        </a>
      </li>
    </ul>
  </li>
  <li class="nav-item has-treeview {{ Request::segment(1) == 'pengguna' ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::segment(1) == 'pengguna' ? 'active' : '' }}">
      <i class="nav-icon fas fa-user"></i>
      <p>
        Pengguna
        <i class="fas fa-angle-left right"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ route('profil-pengguna', Auth::user()->username) }}" class="nav-link {{ (Request::segment(1) == 'pengguna' && Request::segment(2) == 'profil') ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>Profil</p>
        </a>
      </li>
    </ul>
  </li>
</ul>