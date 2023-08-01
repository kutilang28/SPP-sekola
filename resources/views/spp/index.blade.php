
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
            <h1 class="m-0">Data SPP</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Bordered Table</h3>
            <div class="card-tools">
              <a href="{{route('spp.create')}}" class="btn btn-success">tambah data <i class="fas fa-plus-square"></i></a>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px">id_spp</th>
                  <th>Tahun</th>
                  <th>Nominal</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $item)
                    <tr>
                      <td>{{$item -> id_spp}}</td>
                      <td>{{$item -> tahun}}</td>
                      <td>Rp. {{$item -> nominal}}</td>
                      <td>
                        <form action="{{ route('spp.destroy', $item->id_spp)  }}" method="POST">
                          <a class="btn btn-warning" href="{{route('spp.edit', $item->id_spp)}}">Edit</a>
                          @csrf
                          @method('delete')
                          <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                      </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
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
@include('sweetalert::alert')
</body>
</html>
