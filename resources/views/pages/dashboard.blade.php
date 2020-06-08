@extends('layouts.app')

@section('title')
Dashboard
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
              <span class="info-box-number">{{ $jumlahSuratMasuk }}</span>
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
              <span class="info-box-number">{{ $jumlahDisposisi }}</span>
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
              <span class="info-box-number">{{ $jumlahPengguna }}</span>
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
        <div class="col-md-12">
          <!-- TABLE: SURAT MASUK TERAKHIR -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Surat Masuk Terakhir</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-2">
              <table id="tbl-surat-masuk-terakhir" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Terima Dari</th>
                    <th>Nomor Surat</th>
                    <th>Perihal</th>
                    <th>Penerima</th>
                    <th>Waktu Input</th>
                    <th>Status</th>
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
                  </tr>
                  @empty
                  <tr>
                    <td colspan="4" class="text-center">
                      Data Kosong
                    </td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
              <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              @if (in_array(Auth::user()->role, ['ADMIN', 'SEKRETARIS']))
              <a href="{{ route('input-surat-masuk') }}" class="btn btn-sm btn-outline-success float-left">Input Surat masuk</a>&nbsp;
              @endif
              @if (in_array(Auth::user()->role, ['ADMIN', 'SEKRETARIS']))
              <a href="{{ route('daftar-surat-masuk') }}" class="btn btn-sm btn-outline-secondary">Lihat Daftar Surat Masuk</a>
              @endif
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
    $("#tbl-surat-masuk-terakhir").DataTable({
			"lengthChange": true,
      "responsive": true,
      "autoWidth": false,
      "order": [[ 4, "desc" ]],
    });
  });
</script>
@endpush