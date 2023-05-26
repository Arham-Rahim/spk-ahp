@extends('layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">User</li>
        </ol>
    </section>
    <!-- Content Body -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
              @if(session()->has('success'))
              <div class="alert alert-success alert-dismissible ">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-warning"></i> {{ session('success') }}
              </div>
              @endif
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Data User</h3>
                      <div class="box-tools">
                        <a href="/user/create" class="btn btn-block btn-primary"><i class="fa fa-plus"> </i>  Data Baru</a>
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Email</th>
                          <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $no = 1; @endphp
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="/user/{{ $user->id }}/edit" class="btn btn-success btn-sm" data-widget="Edit" data-toggle="tooltip" title="Ubah Password"><i class="fa fa-key"></i></a>
                
                                <form action="/user/{{ $user->id }}" method="post" class="inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm" data-widget="Delete" data-toggle="tooltip" title="Delete" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                <i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach                        
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.box-body -->
                  </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('js_script')
  <!-- jQuery 2.2.3 -->
  <script src="vendor/plugins/jQuery/jquery-2.2.3.min.js"></script>

  <!-- DataTables -->
  <script src="vendor/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/plugins/datatables/dataTables.bootstrap.min.js"></script>

  <script>
    $(function () {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
      });
    });
  </script>

@endsection