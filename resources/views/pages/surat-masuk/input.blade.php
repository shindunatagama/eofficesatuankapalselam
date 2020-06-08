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
          <h1 class="m-0 text-dark">Surat Masuk</h1>
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
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="card card-warning card-outline">
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
                    <input type="text" name="terima_dari" value="{{ old('terima_dari') }}" class="form-control" id="terima-dari" placeholder="Terima Dari">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nomor-surat" class="col-sm-2 col-form-label">Nomor Surat</label>
                  <div class="col-sm-10">
                    <input type="text" name="nomor_surat" value="{{ old('nomor_surat') }}" class="form-control" id="nomor-surat" placeholder="Nomor Surat">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="tanggal-surat" class="col-sm-2 col-form-label">Tanggal Surat</label>
                  <div class="col-sm-10">
                    <div class="input-group date" id="tanggal-surat" data-target-input="nearest" style="width: 50%;">
                      <input type="text" name="tanggal_surat" value="{{ old('tanggal_surat') }}" class="form-control datetimepicker-input" data-target="#tanggal-surat" placeholder="Tanggal Surat"/>
                      <div class="input-group-append" data-target="#tanggal-surat" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="perihal-surat" class="col-sm-2 col-form-label">Perihal</label>
                  <div class="col-sm-10">
                    <input type="text" name="perihal_surat" value="{{ old('perihal_surat') }}" class="form-control" id="perihal-surat" placeholder="Perihal">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="file" class="col-sm-2 col-form-label">File</label>
                  <div class="col-sm-10">
                    <div class="custom-file">
                      <input type="file" name="file" class="custom-file-input" id="file">
                      <label class="custom-file-label" for="file">Pilih File</label>
                    </div>
                    <code>
                      Ukuran Maksimal : 5 MB
                      Ekstensi : pdf
                    </code>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn bg-gradient-primary">Simpan</button>
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
<!-- Moment -->
<script src="{{ url('adminlte/plugins/moment/moment.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ url('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<script type="text/javascript">
  $(document).ready(function () {
    //File input
    bsCustomFileInput.init();

    //Date time picker
    $('#tanggal-surat').datetimepicker({
        format: 'YYYY/MM/DD'
    });
  });
</script>
@endpush