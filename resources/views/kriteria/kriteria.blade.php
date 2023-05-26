@extends('layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Kriteria
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Kriteria</li>
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
                      <h3 class="box-title">Data Kriteria</h3>
                      <div class="box-tools">
                        <a href="/kriteria/create" class="btn btn-block btn-primary"><i class="fa fa-plus"> </i>  Data Baru</a>
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <table id="example" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Kriteria</th>
                          <th>Boto Kriteria</th>
                          <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                          @php $no = 1; @endphp
                          @foreach ($kriterias as $kriteria)
                          <tr>
                              <td>{{ $no++ }}</td>
                              <td>{{ $kriteria->nama_kriteria }}</td>
                              <td>{{ $kriteria->bobot_kriteria }}</td>
    
                              <td>
                                  <a href="/kriteria/{{ $kriteria->id }}/edit" class="btn btn-success btn-sm" data-widget="Edit" data-toggle="tooltip" title="Ubah Password"><i class="fa fa-pencil"></i></a>
                  
                                  <form action="/kriteria/{{ $kriteria->id }}" method="post" class="inline">
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
                          <th>Nama Kriteria</th>
                          <th>Bobot Kriteria</th>
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
    @foreach ($kriterias as $kriteria)
    <section class="content">
      <div class="row">
          <div class="col-lg-12">
            @if(session()->has('success'.$kriteria->id))
              <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close id{{ $kriteria->id }}" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-warning"></i> {{ session('success'.$kriteria->id) }}
              </div>
            @endif
              <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Data Sub Kriteria <b>({{ $kriteria->nama_kriteria }})</b></h3>
                    <div class="box-tools">
                      <a href="/subkriteria/{{ $kriteria->id }}/add_subkriteria" class="btn btn-block btn-primary"><i class="fa fa-plus"> </i>  Subkriteria Baru</a>
                    </div>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="example{{ $kriteria->id }}" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Kriteria</th>
                        <th>Aksi</th>
                      </tr>
                      </thead>
                      <tbody>
                        @php $no = 1; @endphp
                        @foreach ($subkriterias->where('kriteria_id', $kriteria->id) as $sub)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $sub->nama_sub_kriteria }}</td>
                            <td>
                                <a href="/subkriteria/{{ $sub->id }}/edit" class="btn btn-success btn-sm" data-widget="Edit" data-toggle="tooltip" title="Ubah Sub Kategori"><i class="fa fa-pencil"></i></a>
                
                                <form action="/subkriteria/{{ $sub->id }}" method="post" class="inline">
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
                        <th>Nama Kriteria</th>
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
    @endforeach
    
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
      var kriterias = {{ Js::from($kriterias) }}
      $("#example").DataTable();
      kriterias.forEach((kriteria) => {
        $("#example"+kriteria.id).DataTable();
        var target = $('.id'+kriteria.id);
        if (target.length) {
          $('html, body').stop().animate({
            scrollTop: target.offset().top - 50
          }, 10);
        }
      });
    });
    
  </script>

@endsection