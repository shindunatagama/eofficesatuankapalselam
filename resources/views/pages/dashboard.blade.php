<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Dashboard</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ url('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ url('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('adminlte/dist/css/adminlte.min.css') }}">
  <!-- My style -->
  <link rel="stylesheet" href="{{ url('adminlte/styles/mystyle.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed text-sm">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
			<!-- User image -->
			<li class="nav-item dropdown">
				<a class="nav-link" data-toggle="dropdown" href="#">
          <img src="{{ url('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2 user-img" alt="User Image">
          <span class="d-none d-md-inline user-info">Shindu Nata Gama</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">
            Shindu Nata Gama
            <br />
            <span class="text-xs">Laksamana Jendral</span>
          </span>
          <div class="dropdown-divider"></div>
          <div class="dropdown-item">
            <i class="fas fa-user-tag mr-2"></i> Hak Akses
            <span class="float-right text-muted text-sm">Admin</span>
          </div>
          <div class="dropdown-divider"></div>
          <div class="dropdown-item">
            <a href="#" class="btn btn-default btn-flat">Profil</a>
            <a href="#" class="float-right btn btn-default btn-flat">Keluar</a>
          </div>
        </div>
			</li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ url('adminlte/dist/img/logo-satuan-kapal-selam.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Satuan Kapal Selam</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Surat Masuk
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Input</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Persetujuan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Disposisi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Pengguna
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/UI/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Persetujuan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/icons.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pemeliharaan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                Aktivitas
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-12 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-inbox"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Surat Masuk</span>
                <span class="info-box-number">100</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-12 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-handshake"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Disposisi</span>
                <span class="info-box-number">35</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-12 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pengguna</span>
                <span class="info-box-number">50</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
            <!-- TABLE: SURAT MASUK TERAKHIR -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Surat Masuk Terakhir</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool">
                    <i class="fas fa-sync-alt"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-2">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nomor Surat</th>
                      <th>Penginput</th>
                      <th>Waktu Input</th>
                      <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR9842</a></td>
                      <td>Call of Duty IV</td>
                      <td>Shindu Nata Gama</td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                      </td>
                      <td><span class="badge badge-success">Shipped</span></td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR1848</a></td>
                      <td>Samsung Smart TV</td>
                      <td>Shindu Nata Gama</td>
                      <td>
                        <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                      </td>
                      <td><span class="badge badge-warning">Pending</span></td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR7429</a></td>
                      <td>iPhone 6 Plus</td>
                      <td>Shindu Nata Gama</td>
                      <td>
                        <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                      </td>
                      <td><span class="badge badge-danger">Delivered</span></td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR7429</a></td>
                      <td>Samsung Smart TV</td>
                      <td>Shindu Nata Gama</td>
                      <td>
                        <div class="sparkbar" data-color="#00c0ef" data-height="20">90,80,-90,70,-61,83,63</div>
                      </td>
                      <td><span class="badge badge-info">Processing</span></td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR1848</a></td>
                      <td>Samsung Smart TV</td>
                      <td>Shindu Nata Gama</td>
                      <td>
                        <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                      </td>
                      <td><span class="badge badge-warning">Pending</span></td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR7429</a></td>
                      <td>iPhone 6 Plus</td>
                      <td>Shindu Nata Gama</td>
                      <td>
                        <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                      </td>
                      <td><span class="badge badge-danger">Delivered</span></td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR9842</a></td>
                      <td>Call of Duty IV</td>
                      <td>Shindu Nata Gama</td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                      </td>
                      <td><span class="badge badge-success">Shipped</span></td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Input Surat masuk</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">Lihat Daftar Surat Masuk</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          <div class="col-md-4">
            <!-- DAFTAR AKTIVITAS -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Aktivitas Terakhir</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool">
                    <i class="fas fa-sync-alt"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                  <li class="item">
                    <a href="javascript:void(0)" class="product-title">Samsung TV
                      <span class="badge badge-warning float-right">$1800</span></a>
                    <span class="product-description">
                      Samsung 32" 1080p 60Hz LED Smart HDTV.
                    </span>
                  </li>
                  <!-- /.item -->
                  <li class="item">
                    <a href="javascript:void(0)" class="product-title">Bicycle
                      <span class="badge badge-info float-right">$700</span></a>
                    <span class="product-description">
                      26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                    </span>
                  </li>
                  <!-- /.item -->
                  <li class="item">
                    <a href="javascript:void(0)" class="product-title">
                      Xbox One <span class="badge badge-danger float-right">
                      $350
                    </span>
                    </a>
                    <span class="product-description">
                      Xbox One Console Bundle with Halo Master Chief Collection.
                    </span>
                  </li>
                  <!-- /.item -->
                  <li class="item">
                    <a href="javascript:void(0)" class="product-title">PlayStation 4
                      <span class="badge badge-success float-right">$399</span></a>
                    <span class="product-description">
                      PlayStation 4 500GB Console (PS4)
                    </span>
                  </li>
                  <!-- /.item -->
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="javascript:void(0)" class="uppercase">Lihat Daftar Aktivitas</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="http://eofficesatuankapalselam.com">E-Office Satuan Kapal Selam</a>.</strong>
    All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ url('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ url('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ url('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('adminlte/dist/js/adminlte.js') }}"></script>
</body>
</html>
