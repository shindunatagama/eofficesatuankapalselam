<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
	<!-- Left navbar links -->
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
		</li>
	</ul>

	<!-- Right navbar links -->
	<ul class="navbar-nav ml-auto">
		<!-- User image -->
		<li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#">
				<img src="{{ url('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2 user-img" alt="User Image">
				<span class="d-none d-md-inline user-info">Shindu Nata Gama</span>
			</a>
			<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				<span class="dropdown-item dropdown-header">
					Shindu Nata Gama
					<br />
					<span class="text-xs">Laksamana Jendral</span>
				</span>
				<div class="dropdown-divider"></div>
				<div class="dropdown-item">
					<i class="fas fa-user-tag mr-2"></i> Hak Akses
					<span class="float-right text-muted text-sm">Admin</span>
				</div>
				<div class="dropdown-divider"></div>
				<div class="dropdown-item">
					<a href="#" class="btn btn-default btn-flat">Profil</a>
					<a href="#" class="float-right btn btn-default btn-flat" data-toggle="modal" data-target="#modal-logout">Keluar</a>
				</div>
			</div>
		</li>
	</ul>
</nav>
<!-- /.navbar -->

<div class="modal fade" id="modal-logout">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Logout</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Anda yakin ingin logout?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
				<button type="button" class="btn btn-primary">Logout</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->