@extends('layouts.app')

@section('title')
Disposisi Surat Masuk
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
            <li class="breadcrumb-item active">Disposisi</li>
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
              <h3 class="card-title">Disposisi Surat Masuk</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('disposisi-act-surat-masuk') }}" method="post">
              @csrf

              <input type="hidden" name="uuid" value="{{ $mail->uuid }}">

              <div class="card-body">
                <div class="form-group row">
                  <label for="terima-dari" class="col-sm-2 col-form-label">Terima Dari</label>
                  <div class="col-sm-10">
                    <input type="text" name="terima_dari" value="{{ $mail->terima_dari }}" class="form-control" id="terima-dari" placeholder="Terima Dari" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nomor-surat" class="col-sm-2 col-form-label">Nomor Surat</label>
                  <div class="col-sm-10">
                    <input type="text" name="nomor_surat" value="{{ $mail->nomor_surat }}" class="form-control" id="nomor-surat" placeholder="Nomor Surat" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="tanggal-surat" class="col-sm-2 col-form-label">Tanggal Surat</label>
                  <div class="col-sm-10">
                    <div class="input-group date" id="tanggal-surat" data-target-input="nearest" style="width: 50%;">
                      <input type="text" name="tanggal_surat" value="{{ $mail->tanggal_surat }}" class="form-control datetimepicker-input" data-target="#tanggal-surat" placeholder="Tanggal Surat" readonly/>
                      <div class="input-group-append" data-target="#tanggal-surat" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="perihal-surat" class="col-sm-2 col-form-label">Perihal</label>
                  <div class="col-sm-10">
                    <input type="text" name="perihal_surat" value="{{ $mail->perihal_surat }}" class="form-control" id="perihal-surat" placeholder="Perihal" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="file" class="col-sm-2 col-form-label">File</label>
                  <label class="col-sm-10 col-form-label">
                    <a href="{{ Storage::url($mail->file) }}" target="_blank">
                      <code><i class="fas fa-file-alt"></i>&nbsp;{{ explode('/', $mail->file)[2] }}</code>
                    </a>
                  </label>
                </div>
                <div class="form-group row">
                  <label for="alamat-aksi" class="col-sm-2 col-form-label">Alamat Aksi</label>
                  <div class="col-sm-3">
                    <div class="form-check">
                      <input class="form-check-input chkbx-input" type="checkbox" name="alamat_aksi[]" value="pasops" id="pasops">
                      <label class="form-check-label chkbx-label">PASOPS</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input chkbx-input" type="checkbox" name="alamat_aksi[]" value="pasharmat" id="pasharmat">
                      <label class="form-check-label chkbx-label">PASHARMAT</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input chkbx-input" type="checkbox" name="alamat_aksi[]" value="pasprogar" id="pasprogar">
                      <label class="form-check-label chkbx-label">PASPROGAR</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input chkbx-input" type="checkbox" name="alamat_aksi[]" value="pasminpres" id="pasminpres">
                      <label class="form-check-label chkbx-label">PASMINPERS</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input chkbx-input" type="checkbox" name="alamat_aksi[]" value="kaset" id="kaset">
                      <label class="form-check-label chkbx-label">KASET</label>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-check">
                      <input class="form-check-input chkbx-input" type="checkbox" name="alamat_aksi[]" value="dan-kri-cka-401" id="dan-kri-cka-401">
                      <label class="form-check-label chkbx-label">DAN KRI CKA - 401</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input chkbx-input" type="checkbox" name="alamat_aksi[]" value="dan-kri-ngl-402" id="dan-kri-ngl-402">
                      <label class="form-check-label chkbx-label">DAN KRI NGL - 402</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input chkbx-input" type="checkbox" name="alamat_aksi[]" value="dan-kri-nps-403" id="dan-kri-nps-403">
                      <label class="form-check-label chkbx-label">DAN KRI NPS - 403</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input chkbx-input" type="checkbox" name="alamat_aksi[]" value="dan-kri-adl-404" id="dan-kri-adl-404">
                      <label class="form-check-label chkbx-label">DAN KRI ADL - 404</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input chkbx-input" type="checkbox" name="alamat_aksi[]" value="dan-kri-agr-405" id="dan-kri-agr-405">
                      <label class="form-check-label chkbx-label">DAN KRI AGR - 405</label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="aksiaksi" class="col-sm-2 col-form-label">Aksi</label>
                  <div class="col-sm-3">
                    <div class="form-check">
                      <input class="form-check-input chkbx-input" type="checkbox" name="aksi[]" value="acc" id="acc">
                      <label class="form-check-label chkbx-label">ACC</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input chkbx-input" type="checkbox" name="aksi[]" value="udk" id="udk">
                      <label class="form-check-label chkbx-label">UDK</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input chkbx-input" type="checkbox" name="aksi[]" value="koordinasikan" id="korrdinasikan">
                      <label class="form-check-label chkbx-label">KOORDINASIKAN</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input chkbx-input" type="checkbox" name="aksi[]" value="siapkan" id="siapkan">
                      <label class="form-check-label chkbx-label">SIAPKAN</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input chkbx-input" type="checkbox" name="aksi[]" value="laporkan" id="laporkan">
                      <label class="form-check-label chkbx-label">LAPORKAN</label>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-check">
                      <input class="form-check-input chkbx-input" type="checkbox" name="aksi[]" value="monitoring" id="monitoring">
                      <label class="form-check-label chkbx-label">MONITORING</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input chkbx-input" type="checkbox" name="aksi[]" value="wakili" id="wakili">
                      <label class="form-check-label chkbx-label">WAKILI</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input chkbx-input" type="checkbox" name="aksi[]" value="tanggapan-saran" id="tanggapan-saran">
                      <label class="form-check-label chkbx-label">TANGGAPAN / SARAN</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input chkbx-input" type="checkbox" name="aksi[]" value="bahas-rapatkan" id="bahas-rapatkan">
                      <label class="form-check-label chkbx-label">BAHAS - RAPATKAN</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input chkbx-input" type="checkbox" name="aksi[]" value="buat-jawaban" id="buat-jawaban">
                      <label class="form-check-label chkbx-label">BUAT JAWABAN</label>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-check">
                      <input class="form-check-input chkbx-input" type="checkbox" name="aksi[]" value="sebagai-bahan" id="sebagai-bahan">
                      <label class="form-check-label chkbx-label">SEBAGAI BAHAN</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input chkbx-input" type="checkbox" name="aksi[]" value="tindak-lanjuti-aksi" id="tindak-lanjuti-aksi">
                      <label class="form-check-label chkbx-label">TINDAK LANJUTI / AKSI</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input chkbx-input" type="checkbox" name="aksi[]" value="hadir-tidak-hadir" id="hadir-tidak-hadir">
                      <label class="form-check-label chkbx-label">HADIR - TDK HADIR</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input chkbx-input" type="checkbox" name="aksi[]" value="acarakan-agendakan" id="acarakan-agendakan">
                      <label class="form-check-label chkbx-label">ACARAKAN / AGENDAKAN</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input chkbx-input" type="checkbox" name="aksi[]" value="file-arsipkan" id="file-arsipkan">
                      <label class="form-check-label chkbx-label">FILE / ARSIPKAN</label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="catatan" class="col-sm-2 col-form-label">Catatan</label>
                  <div class="col-sm-10">
                    <textarea class="textarea" placeholder="Place some text here" name="catatan"
                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $mail->catatan }}</textarea>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn bg-gradient-primary">Update</button>
                <a href="{{ route('daftar-surat-masuk') }}">
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

@push('addon-style')
<!-- Tempusdominus Bbootstrap 4 -->
<link rel="stylesheet" href="{{ url('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
<!-- summernote -->
<link rel="stylesheet" href="{{ url('adminlte/plugins/summernote/summernote-bs4.css') }}">

<style type="text/css">
.chkbx-input {
  margin-top: 0.5rem
}

.chkbx-label {
  padding-top: 0.3rem;
}
</style>
@endpush

@push('addon-script')
<!-- bs-custom-file-input -->
<script src="{{ url('adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<!-- Moment -->
<script src="{{ url('adminlte/plugins/moment/moment.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ url('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ url('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>

<script type="text/javascript">
  $(document).ready(function () {
    //File input
    bsCustomFileInput.init();

    //Date time picker
    $('#tanggal-surat').datetimepicker({
        format: 'YYYY/MM/DD'
    });

    // Summernote
    $('.textarea').summernote();

    // Untuk cek checkbox alamat aksi
    var alamatAksi = '{!! $mail->alamat_aksi !!}';
    if (alamatAksi != '') {
      var arrAlamatAksi = JSON.parse(alamatAksi);
      for (var i = 0; i < arrAlamatAksi.length; i++) {
        document.getElementById(arrAlamatAksi[i]).checked = true;
      }
    }

    // Untuk cek checkbox aksi
    var aksi = '{!! $mail->aksi !!}';
    if (aksi != '') {
      var arrAksi = JSON.parse(aksi);
      for (var j = 0; j < arrAksi.length; j++) {
        document.getElementById(arrAksi[j]).checked = true;
      }
    }
  });
</script>
@endpush