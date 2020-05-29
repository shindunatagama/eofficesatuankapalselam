<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="index3.html" class="brand-link">
		<img src="{{ url('adminlte/dist/img/logo-satuan-kapal-selam.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">Satuan Kapal Selam</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
							with font-awesome or any other icon font library -->
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>
				<li class="nav-item has-treeview menu-open">
					<a href="#" class="nav-link active">
						<i class="nav-icon fas fa-envelope"></i>
						<p>
							Surat Masuk
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('input-surat-masuk') }}" class="nav-link active">
								<i class="far fa-circle nav-icon"></i>
								<p>Input</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="pages/charts/flot.html" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Persetujuan</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="pages/charts/inline.html" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Disposisi</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="pages/charts/inline.html" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Daftar</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-user"></i>
						<p>
							Pengguna
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="pages/UI/general.html" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Persetujuan</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="pages/UI/icons.html" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Pemeliharaan</p>
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>