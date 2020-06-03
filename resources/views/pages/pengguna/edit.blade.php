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
					<!-- Profil Box -->
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Profil</h3>
						</div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('update-pengguna') }}" method="post">
              @csrf
              
              <input type="hidden" name="id" value="{{ $user->id }}"/>

              <div class="card-body">
                <div class="form-group row">
                  <div class="col-sm-2 col-form-label">Foto</div>
                  <div class="col-sm-10">
                    <img class="profile-user-img img-fluid img-circle" id="upload-image"
                      src="{{ Storage::url($user->photo) }}" alt="User profile picture">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="name" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" id="name" class="form-control" placeholder="Nama" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="rank" class="col-sm-2 col-form-label">Pangkat</label>
                  <div class="col-sm-10">
                    <input type="text" name="rank" value="{{ old('rank', $user->rank) }}" id="rank" class="form-control" placeholder="Pangkat" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="username" class="col-sm-2 col-form-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" name="username" value="{{ old('username', $user->username) }}" id="username" class="form-control" placeholder="Username" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="email" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" name="email" value="{{ old('email', $user->email) }}" id="email" class="form-control" placeholder="Email" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="roles" class="col-sm-2 col-form-label">Hak Akses</label>
                  <div class="col-sm-10">
                    <select name="roles" class="form-control">
                      <option value="STAFF" {{ old('roles', $user->roles) == "STAFF" ? "selected" : "" }}>Staff</option>
                      <option value="SEKRETARIS" {{ old('roles', $user->roles) == "SEKRETARIS" ? "selected" : "" }}>Sekretaris</option>
                      <option value="SUPERVISOR" {{ old('roles', $user->roles) == "SUPERVISOR" ? "selected" : "" }}>Supervisor</option>
                      <option value="PIMPINAN" {{ old('roles', $user->roles) == "PIMPINAN" ? "selected" : "" }}>Pimpinan</option>
                      <option value="ADMIN" {{ old('roles', $user->roles) == "ADMIN" ? "selected" : "" }}>Admin</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="status" class="col-sm-2 col-form-label">Status</label>
                  <div class="col-sm-10">
                    <select name="status" class="form-control">
                      <option value="PENDING" {{ old('status', $user->status) == "PENDING" ? "selected" : "" }}>Pending</option>
                      <option value="ACTIVE" {{ old('status', $user->status) == "ACTIVE" ? "selected" : "" }}>Active</option>
                      <option value="NONACTIVE" {{ old('status', $user->status) == "NONACTIVE" ? "selected" : "" }}>Non Active</option>
                    </select>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('pemeliharaan-pengguna') }}">
                  <button type="button" class="btn btn-default">Kembali</button>
                </a>
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