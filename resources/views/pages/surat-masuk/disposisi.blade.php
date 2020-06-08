@extends('layouts.app')

@section('title')
Disposisi Surat Masuk
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
						<li class="breadcrumb-item active">Disposisi</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
      @if ($errors->any())
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif

      @if (Session::has('flashmsgsucc'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ Session::get('flashmsgsucc') }}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>  
      @endif
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Daftar Surat Masuk Untuk Disposisi</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="tbl-persetujuan-surat-masuk" class="table table-bordered table-striped">
								<thead>
                  <tr>
                    <th>Terima Dari</th>
                    <th>Nomor Surat</th>
                    <th>Perihal</th>
                    <th>Penerima</th>
                    <th>Waktu Input</th>
                    <th>Action</th>
                  </tr>
								</thead>
								<tbody>
                  @forelse ($mails as $mail)
                  <tr>
                    <td>{{ $mail->terima_dari }}</td>
                    <td>{{ $mail->nomor_surat }}</td>
                    <td>{{ $mail->perihal_surat }}</td>
                    <td>{{ $mail->userPenerima->name }}</td>
                    <td>{{ $mail->created_at }}</td>
                    <td>
                      <a href="{{ route('disposisi-view-surat-masuk', $mail->uuid) }}">
                        <button type="button" class="btn btn-block btn-outline-info">
                          Detail
                        </button>
                      </a>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="6" class="text-center">
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
    $("#tbl-persetujuan-surat-masuk").DataTable({
			"lengthChange": true,
      "responsive": true,
      "autoWidth": false,
      "order": [[ 4, "desc" ]],
    });
  });
</script>
@endpush