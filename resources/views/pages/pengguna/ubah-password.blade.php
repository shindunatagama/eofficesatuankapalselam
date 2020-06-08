@extends('layouts.app')

@section('title')
Profil Pengguna
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
            <li class="breadcrumb-item active">Profil</li>
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
					<!-- Ubah Password Box -->
					<div class="card card-warning card-outline">
						<div class="card-header">
							<h3 class="card-title">Ubah Password</h3>
						</div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('update-password') }}" method="post">
              @csrf

              <input type="hidden" name="uuid" value="{{ $user->id . $user->uuid }}"/>

              <div class="card-body">
                <div class="form-group row">
                  <label for="old-password" class="col-sm-2 col-form-label">Password Lama</label>
                  <div class="col-sm-10">
                    <input type="password" name="old_password" value="" id="old-password" class="form-control" placeholder="Password Lama">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="password" class="col-sm-2 col-form-label">Password Baru</label>
                  <div class="col-sm-10">
                    <input type="password" name="password" value="" id="password" class="form-control" placeholder="Password">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="password-confirm" class="col-sm-2 col-form-label">Konfirmasi Password Baru</label>
                  <div class="col-sm-10">
                    <input type="password" name="password_confirmation" value="" id="password-confirm" class="form-control" placeholder="Konfirmasi Password Baru">
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn bg-gradient-primary">Ubah Password</button>
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

@push('addon-script')
<!-- bs-custom-file-input -->
<script src="{{ url('adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

<script type="text/javascript">
$(document).ready(function () {
	//File input
	bsCustomFileInput.init();
});

function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
				$('#upload-image')
					.attr('src', e.target.result);
		};
		reader.readAsDataURL(input.files[0]);

		document.getElementById('upload-image').style.display = '';
	}
}
</script>
@endpush