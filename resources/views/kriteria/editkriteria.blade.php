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
            <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="/kriteria"><i class="fa fa-pencil"></i> Kriteria</a></li>
            <li class="active"></i> Form Edit Kriteria</li>
        </ol>
    </section>
    <!-- Content Body -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Form Edit Kriteria</h3>
                    </div>
                    <!-- form start -->
                    <form action="/kriteria/{{ $kriteria->id }}" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="box-body">
                            <div class="form-group @error('nama_kriteria') has-error @enderror">
                                <label for="nama_kriteria">Nama Krite</label>
                                <input type="text" class="form-control" name="nama_kriteria" id="nama_kriteria" placeholder="Nama Kriteria" value="{{ old('nama_kriteria', $kriteria->nama_kriteria) }}">
                                @error('nama_kriteria')<span class="help-block">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group @error('bobot_kriteria') has-error @enderror">
                              <label for="bobot_kriteria">Bobot Kriteria</label>
                              <input type="number" step="0.01" class="form-control" name="bobot_kriteria" id="bobot_kriteria" placeholder="Bobot Kriteria" value="{{ old('bobot_kriteria', $kriteria->bobot_kriteria) }}">
                              @error('bobot_kriteria')<span class="help-block">{{ $message }}</span> @enderror
                          </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="/kriteria" class="btn btn-default">Cancel</a>
                          </div>
                        </form>
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