
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
            <h1 class="m-0">Edit Data Kelas</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{url('siswa')}}" method="post">
            @csrf
            @method('PUT')
            <div class="card-body">
              <div class="form-group">
                <label for="nisn">NISN</label>
                <input for="nisn" name="nisn" type="text" class="form-control" id="nisn" placeholder="" required>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="nis">nis</label>
                <input for="nis" name="nis" type="text" class="form-control" id="nis" placeholder="" required>
              </div>
            </div>
            <div class="form-group">
              <select name="id_kelas" id="id_kelas" class="form-control select2">
                <option value="">Pilih kelas</option>
                @foreach ($idkel as $item)
                    <option value="{{ $item->id_kelas }}">{{$item->nama_kelas}}</option>
                @endforeach
              </select>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="alamat">alamat</label>
                <input for="alamat" name="alamat" type="text" class="form-control" id="alamat" placeholder="" required>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="no_telp">nomor telpon</label>
                <input for="no_telp" name="no_telp" type="number" class="form-control" id="no_telp
                " placeholder="" required>
              </div>
            </div>
            <div class="form-group">
              <select name="id_spp" id="id_spp" class="form-control select2">
                <option value="">Pilih id SPP</option>
                @foreach ($idspp as $item2)
                    <option value="{{ $item2->id_spp }}" @required(true)>{{$item2->tahun}}</option>
                @endforeach
              </select>
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
