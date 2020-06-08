<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="{{ route('home') }}" class="brand-link">
		<img src="{{ url('adminlte/dist/img/logo-satuan-kapal-selam.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">Satuan Kapal Selam</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar Menu -->
		<nav class="mt-2">
			@if (Auth::user()->role == 'ADMIN')
			@include('menu.admin')
			@elseif (Auth::user()->role == 'PIMPINAN')
			@include('menu.pimpinan')
			@elseif (Auth::user()->role == 'SUPERVISOR')
			@include('menu.supervisor')
			@elseif (Auth::user()->role == 'SEKRETARIS')
			@include('menu.sekretaris')
			@elseif (Auth::user()->role == 'STAFF')
			@include('menu.staff')
			@endif
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>