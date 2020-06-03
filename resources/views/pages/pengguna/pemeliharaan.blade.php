@extends('layouts.app')

@section('title')
Pemeliharaan Surat Masuk
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Pengguna</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
						<li class="breadcrumb-item">Pengguna</li>
						<li class="breadcrumb-item active">Pemeliharaan</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Daftar Pengguna</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="tbl-pengguna" class="table table-bordered table-striped">
								<thead>
                  <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Tanggal Input</th>
                    <th>Tanggal Update</th>
                    <th>Hak Akses</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
								</thead>
								<tbody>
                  @forelse ($users as $user)
                  <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td>{{ $user->roles }}</td>
                    <td>
                      @if ($user->status == 'PENDING')
                      <span class="badge badge-warning">{{ $user->status }}</span>
                      @elseif ($user->status == 'ACTIVE')
                      <span class="badge badge-success">{{ $user->status }}</span>
                      @elseif ($user->status == 'NONACTIVE')
                      <span class="badge badge-danger">{{ $user->status }}</span>   
                      @endif
                    </td>
                    <td>
                      <a href="{{ route('detail-pengguna', $user->username) }}">
                        <button type="button" class="btn btn-block btn-outline-info">
                          Detail
                        </button>
                      </a>
                      &nbsp;
                      <a href="{{ route('edit-pengguna', $user->username) }}">
                        <button type="button" class="btn btn-block btn-outline-secondary">
                          Edit
                        </button>
                      </a>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="7" class="text-center">
                      Data Kosong
                    </td>
                  </tr>
                  @endforelse
								</tbody>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@push('addon-style')
<!-- DataTables -->
<link rel="stylesheet" href="{{ url('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ url('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@push('addon-script')
<!-- DataTables -->
<script src="{{ url('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ url('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ url('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<script type="text/javascript">
  $(document).ready(function () {
    $("#tbl-pengguna").DataTable({
			"lengthChange": true,
      "responsive": true,
      "autoWidth": false
    });
  });
</script>
@endpush