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
                      <input type="text" name="terima_dari" class="form-control form-control-sm" id="terima-dari" placeholder="Terima Dari">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="nomor-surat" class="col-sm-2 col-form-label">Nomor Surat</label>
                    <div class="col-sm-10">
                      <input type="text" name="nomor_surat" class="form-control form-control-sm" id="nomor-surat" placeholder="Nomor Surat">
                    </div>
									</div>
									<div class="form-group row">
                    <label for="tanggal-surat" class="col-sm-2 col-form-label">Tanggal Surat</label>
                    <div class="col-sm-10">
                      <input type="text" name="tanggal_surat" class="form-control form-control-sm" id="tanggal-surat" placeholder="Tanggal Surat">
                    </div>
									</div>
									<div class="form-group row">
                    <label for="perihal-surat" class="col-sm-2 col-form-label">Perihal</label>
                    <div class="col-sm-10">
                      <input type="text" name="perihal_surat" class="form-control form-control-sm" id="perihal-surat" placeholder="Perihal">
                    </div>
									</div>
									<div class="form-group row">
                    <label for="file-surat" class="col-sm-2 col-form-label">File</label>
                    <div class="col-sm-10 myfilelabel">
											<input type="file" name="file_surat" class="custom-file-input" id="file-surat" style="height: 33px !important;">
											<label class="custom-file-label" for="file-surat" style="height: 35px;margin-left: 7.5px;margin-right: 7.5px;padding-left: 7.5px;color: #98a0a8">Pilih File</label>
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