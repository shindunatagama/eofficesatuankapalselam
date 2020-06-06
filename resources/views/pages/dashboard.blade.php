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
              <span class="info-box-number">{{ count($suratMasuk) }}</span>
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
              <span class="info-box-number">{{ count($disposisi) }}</span>
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
              <span class="info-box-number">{{ count($users) }}</span>
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
                    <th>Nomor Surat</th>
                    <th>Penginput</th>
                    <th>Waktu Input</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    @forelse ($mails as $mail)
                    <tr>
                      <td>{{ $mail->nomor_surat }}</td>
                      <td>{{ $mail->user_penerima }}</td>
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
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <a href="{{ route('input-surat-masuk') }}" class="btn btn-sm btn-info float-left">Input Surat masuk</a>
              <a href="{{ route('daftar-surat-masuk') }}" class="btn btn-sm btn-secondary float-right">Lihat Daftar Surat Masuk</a>
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