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
				<img src="{{ Storage::url(Auth::user()->photo) }}" class="img-circle elevation-2 user-img" alt="User Image">
				<span class="d-none d-md-inline user-info">{{ Auth::user()->name }}</span>
			</a>
			<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				<span class="dropdown-item dropdown-header">
					{{ Auth::user()->name }}
					<br />
					<span class="text-xs">{{ Auth::user()->rank }}</span>
				</span>
				<div class="dropdown-divider"></div>
				<div class="dropdown-item">
					<i class="fas fa-user-tag mr-2"></i> Hak Akses
					<span class="float-right text-muted text-sm">{{ Auth::user()->roles }}</span>
				</div>
				<div class="dropdown-divider"></div>
				<div class="dropdown-item">
					<a href="{{ route('profil-pengguna', Auth::user()->username) }}" class="btn btn-default btn-flat">Profil</a>
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
				<form action="{{ url('logout') }}" method="POST">
					@csrf
					
					<button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
					<button type="submit" class="btn btn-primary">Logout</button>
				</form>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->