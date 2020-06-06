<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pendaftaran Pengguna</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ url('adminlte/plugins/ionicons/css/ionicons.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ url('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
	<link rel="stylesheet" href="{{ url('adminlte/dist/css/adminlte.min.css') }}">
	<!-- My style -->
  <link rel="stylesheet" href="{{ url('adminlte/styles/mystyle.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box" style="width: 650px;">
  <div class="login-logo">
		<a href="{{ route('home') }}">
			<img src="{{ url('adminlte/dist/img/logo-satuan-kapal-selam.png') }}" alt="AdminLTE Logo" class="img-circle" style="opacity: .8;height: 200px"/>
		</a>
	</div>

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

  <!-- /.login-logo -->
  <div class="card">
		<form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
			@csrf

			<div class="card-body login-card-body">
				<p class="login-box-msg">Pendaftaran Pengguna</p>
				<div class="form-group">
					<label for="photo">Foto</label>
					<div class="custom-file">
						<input type="file" name="photo" class="custom-file-input" id="photo" onchange="readURL(this);" autofocus>
						<label class="custom-file-label" for="file-surat">Pilih Foto</label>
					</div>
					<code>Ukuran Maksimal : 5 KB</code>
				</div>
				<div class="form-group">
					<img class="profile-user-img img-fluid img-circle" id="upload-image" style="display: none;"
						src="#" alt="User profile picture">
				</div>
				<div class="form-group">
					<label for="name">Nama</label>
					<input type="text" name="name" value="{{ old('name') }}" id="name" class="form-control" placeholder="Nama">
				</div>
				<div class="form-group">
					<label for="rank">Pangkat</label>
					<input type="text" name="rank" value="{{ old('rank') }}" id="rank" class="form-control" placeholder="Pangkat">
				</div>
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" name="username" value="{{ old('username') }}" id="username" class="form-control" placeholder="Username">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" name="email" value="{{ old('email') }}" id="email" class="form-control" placeholder="Email">
				</div>
				<div class="form-group">
					<label for="role">Hak Akses</label>
					<select name="role" class="form-control">
						<option value="STAFF" {{ old('role') == "STAFF" ? "selected" : "" }}>Staff</option>
						<option value="SEKRETARIS" {{ old('role') == "SEKRETARIS" ? "selected" : "" }}>Sekretaris</option>
						<option value="SUPERVISOR" {{ old('role') == "SUPERVISOR" ? "selected" : "" }}>Supervisor</option>
						<option value="PIMPINAN" {{ old('role') == "PIMPINAN" ? "selected" : "" }}>Pimpinan</option>
						<option value="ADMIN" {{ old('role') == "ADMIN" ? "selected" : "" }}>Admin</option>
					</select>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" value="{{ old('password') }}" id="password" class="form-control" placeholder="Password">
				</div>
				<div class="form-group">
					<label for="password-confirm">Konfirmasi Password</label>
					<input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" id="password-confirm" class="form-control" placeholder="Konfirmasi Password">
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-2">
							<input type="text" name="captcha" id="captcha" class="form-control" placeholder="Captcha" autocomplete="off">
						</div>
						<div class="col-4" id="captcha-image">
							<span>{!! captcha_img() !!}</span>
							<button type="button" class="btn btn-default"><i class="fas fa-sync-alt" id="refresh-captcha"></i></button>
						</div>
					</div>
				</div>
			</div>
			<!-- /.login-card-body -->
			<div class="card-footer">
				<div class="form-group">
					<div class="row">
						<div class="col-2">
							<button type="submit" class="btn btn-block bg-gradient-primary">Daftar</button>
						</div>
						<div class="col-2">
							<a href="{{ route('home') }}">
								<button type="button" class="btn btn-default btn-block">Home</button>
							</a>
						</div>
					</div>
				</div>
			</div>
		</form>
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ url('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('adminlte/dist/js/adminlte.min.js') }}"></script>
<!-- bs-custom-file-input -->
<script src="{{ url('adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

<script type="text/javascript">
$(document).ready(function () {
	//File input
	bsCustomFileInput.init();
});

// Show foto after uploading
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

// Refresh captcha image
$('#refresh-captcha').click(function() {
	$.ajax({
		type: 'GET',
		url: '{{ route('refresh-captcha') }}',
		success: function(data) {
			$('#captcha-image span').html(data.captcha);
		}
	});
});
</script>

</body>
</html>
