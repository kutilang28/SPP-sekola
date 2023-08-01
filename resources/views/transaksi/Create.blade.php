
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  @include('layouts.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('layouts.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Transaksi</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{url('transaksi')}}" method="post">
            @csrf
            <div class="form-group">
              <select name="id_petugas" id="id_petugas" class="form-control select2">
                <option value="">Pilih petugas/admin</option>
                @foreach ($iduser as $item)
                    <option value="{{ $item->id }}" @required(true)>{{$item->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <select name="nisn" id="nisn" class="form-control select2">
                <option value="">Pilih siswa</option>
                @foreach ($idsiswa as $item)
                    <option value="{{ $item->nisn }}" @required(true)>{{$item->nama}}</option>
                @endforeach
              </select>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="tgl_bayar">Tanggal Bayar</label>
                <input for="tgl_bayar" name="tgl_bayar" type="date" class="form-control" id="tgl_bayar" placeholder="" required>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="bulan_dibayar">Bulan Dibayar</label>
                <input for="bulan_dibayar" name="bulan_dibayar" type="text" class="form-control" id="bulan_dibayar" placeholder="" required>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="tahun_bayar">Tahun Dibayar</label>
                <input for="tahun_bayar" name="tahun_dibayar" type="text" class="form-control" id="tahun_dibayar" placeholder="" required>
              </div>
            </div>
            <div class="form-group">
              <select name="id_spp" id="id_spp" class="form-control select2">
                <option value="">Pilih SPP</option>
                @foreach ($idspp as $item)
                    <option value="{{ $item->id_spp }}" @required(true)>{{$item->tahun}}</option>
                @endforeach
              </select>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="">Jumlah dibayar</label>
                <input for="jumlah_bayar" name="jumlah_bayar" type="number" class="form-control" id="jumlah_bayar" placeholder="" required>
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div><!-- /.container-fluid -->
    </div>
  </div>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('layouts.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

@include('layouts.script')
</body>
</html>
