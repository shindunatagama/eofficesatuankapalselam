@extends('layouts.app')

@section('title')
Daftar Surat Masuk
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Surat Masuk</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
						<li class="breadcrumb-item">Surat Masuk</li>
						<li class="breadcrumb-item active">Daftar</li>
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
							<h3 class="card-title">Daftar Keseluruhan Surat Masuk</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="tbl-daftar-surat-masuk" class="table table-bordered table-striped">
								<thead>
                  <tr>
                    <th>Terima Dari</th>
                    <th>Nomor Surat</th>
                    <th>Tanggal Surat</th>
                    <th>Perihal Surat</th>
                    <th>Penerima Surat</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
								</thead>
								<tbody>
                  @forelse ($mails as $mail)
                  <tr>
                    <td>{{ $mail->terima_dari }}</td>
                    <td>{{ $mail->nomor_surat }}</td>
                    <td>{{ $mail->tanggal_surat }}</td>
                    <td>{{ $mail->perihal_surat }}</td>
                    <td>{{ $mail->user_penerima }}</td>
                    <td>
                      @if ($mail->status == 'PENDING')
                      <span class="badge badge-warning">{{ $mail->status }}</span>
                      @elseif ($mail->status == 'APPROVED')
                      <span class="badge badge-success">{{ $mail->status }}</span>
                      @elseif ($mail->status == 'REJECTED')
                      <span class="badge badge-danger">{{ $mail->status }}</span>
                      @elseif ($mail->status == 'DISPOSITION')
                      <span class="badge badge-info">{{ $mail->status }}</span>   
                      @endif
                    </td>
                    <td>
                      <a href="{{ route('detail-surat-masuk', $mail->id) }}">
                        <button type="button" class="btn btn-block btn-outline-info">
                          Detail
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
    $("#tbl-daftar-surat-masuk").DataTable({
			"lengthChange": true,
      "responsive": true,
      "autoWidth": false
    });
  });
</script>
@endpush