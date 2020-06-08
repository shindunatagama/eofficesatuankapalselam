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
        <a href="{{ route('daftar-surat-masuk') }}" class="nav-link {{ (Request::segment(1) == 'suratmasuk' && in_array(Request::segment(2), ['daftar', 'detail'])) ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>Daftar</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('input-surat-masuk') }}" class="nav-link {{ (Request::segment(1) == 'suratmasuk' && Request::segment(2) == 'add') ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>Input</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('persetujuan-surat-masuk') }}" class="nav-link {{ (Request::segment(1) == 'suratmasuk' && in_array(Request::segment(2), ['persetujuan', 'approval'])) ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>Persetujuan</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('disposisi-surat-masuk') }}" class="nav-link {{ (Request::segment(1) == 'suratmasuk' && in_array(Request::segment(2), ['disposisi', 'disposisi-view'])) ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>Disposisi</p>
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
        <a href="{{ route('ubah-password-pengguna', Auth::user()->uuid) }}" class="nav-link {{ (Request::segment(1) == 'pengguna' && Request::segment(2) == 'ubah-password') ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>Ubah Password</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('profil-pengguna', Auth::user()->uuid) }}" class="nav-link {{ (Request::segment(1) == 'pengguna' && Request::segment(2) == 'profil') ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>Profil</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('pemeliharaan-pengguna') }}" class="nav-link {{ (Request::segment(1) == 'pengguna' && in_array(Request::segment(2), ['pemeliharaan', 'edit', 'detail'])) ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>Pemeliharaan</p>
        </a>
      </li>
    </ul>
  </li>
</ul>