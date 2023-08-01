
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
          <form action="{{url('kelas', $kelas->id_kelas)}}" method="post">
            @csrf
            @method('PUT')
            <div class="card-body">
              <div class="form-group">
                <label for="nama_kelas">Nama Kelas</label>
                <input for="nama_kelas" name="nama_kelas" type="text" class="form-control" id="nama_kelas" placeholder="" required>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="kompetensi_keahlian">Kompetensi Keahlian</label>
                <input for="kompetensi_keahlian" name="kompetensi_keahlian" type="text" class="form-control" id="kompetensi_keahlian" placeholder="" required>
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Edit</button>
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
