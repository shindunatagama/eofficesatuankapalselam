<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
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
<div class="login-box">
  <div class="login-logo">
		<a href="{{ route('home') }}">
			<img src="{{ url('adminlte/dist/img/logo-satuan-kapal-selam.png') }}" alt="AdminLTE Logo" class="img-circle" style="opacity: .8;height: 200px">
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
    <div class="card-body login-card-body">
      <p class="login-box-msg">Login Untuk Menggunakan Aplikasi</p>

			<form action="{{ route('login') }}" method="post">
				@csrf

        <div class="input-group mb-3">
          <input type="email" name="email" value="{{ old('email') }}" id="email" class="form-control" placeholder="Email" autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" value="{{ old('password') }}" id="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-5">
            <input type="text" name="captcha" id="captcha" class="form-control" placeholder="Captcha" autocomplete="off">
          </div>
          <div class="col-7 text-right" id="captcha-image">
            <span>{!! captcha_img() !!}</span>
            <button type="button" class="btn btn-default"><i class="fas fa-sync-alt" id="refresh-captcha"></i></button>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
              <label for="remember">
                Ingat Saya
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-success btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <hr />

      <p class="mb-1">
        <a href="{{ route('lupa-password-pengguna') }}">Lupa Password</a>
      </p>
      <p class="mb-0">
        <a href="{{ route('register') }}" class="text-center">Pendaftaran Pengguna</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ url('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('adminlte/dist/js/adminlte.min.js') }}"></script>

<script>
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
