@extends('layouts.app')

@section('title')
Input Surat Masuk
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item">Surat Masuk</li>
              <li class="breadcrumb-item active">Input</li>
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
					<div class="col-md-12">
						<!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Input Surat Masuk</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="{{ route('create-surat-masuk') }}" method="post" enctype="multipart/form-data">
								@csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="terima-dari" class="col-sm-2 col-form-label">Terima Dari</label>
                    <div class="col-sm-10">
                      <input type="text" name="terima_dari" class="form-control" id="terima-dari" placeholder="Terima Dari">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="nomor-surat" class="col-sm-2 col-form-label">Nomor Surat</label>
                    <div class="col-sm-10">
                      <input type="text" name="nomor_surat" class="form-control" id="nomor-surat" placeholder="Nomor Surat">
                    </div>
									</div>
									<div class="form-group row">
                    <label for="tanggal-surat" class="col-sm-2 col-form-label">Tanggal Surat</label>
                    <div class="col-sm-10">
                      <div class="input-group date" id="tanggal-surat" data-target-input="nearest" style="width: 35%;">
                        <input type="text" class="form-control datetimepicker-input" data-target="#tanggal-surat"/>
                        <div class="input-group-append" data-target="#tanggal-surat" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
									</div>
									<div class="form-group row">
                    <label for="perihal-surat" class="col-sm-2 col-form-label">Perihal</label>
                    <div class="col-sm-10">
                      <input type="text" name="perihal_surat" class="form-control" id="perihal-surat" placeholder="Perihal">
                    </div>
									</div>
									<div class="form-group row">
                    <label for="file-surat" class="col-sm-2 col-form-label">File</label>
                    <div class="col-sm-10">
                      <div class="custom-file">
											  <input type="file" name="file_surat" class="custom-file-input" id="file-surat">
                        <label class="custom-file-label" for="file-surat">Pilih File</label>
                      </div>
										</div>
									</div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Simpan</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
					</div>
				</div>
			</div>
    </section>
</div>
<!-- /.content-wrapper -->
@endsection

@push('addon-style')
<!-- Tempusdominus Bbootstrap 4 -->
<link rel="stylesheet" href="{{ url('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
@endpush

@push('addon-script')
<!-- bs-custom-file-input -->
<script src="{{ url('adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script src="{{ url('adminlte/plugins/moment/moment.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ url('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
@endpush

@push('addon-script')
<script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init();

    //Date range picker
    $('#tanggal-surat').datetimepicker({
        format: 'L'
    });
  });
</script>
@endpush