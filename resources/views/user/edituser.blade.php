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
            <li><a href="/user"><i class="fa fa-user"></i> User</a></li>
            <li class="active"></i> Form User</li>
        </ol>
    </section>
    <!-- Content Body -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Form Tambah User</h3>
                    </div>
                    <!-- form start -->
                    <form action="/user/{{ $user->id }}" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="box-body">
                            <div class="form-group @error('old_password') has-error @enderror">
                                <label for="old_password">Password Lama</label>
                                <input type="password" class="form-control" name="old_password" id="old_password" placeholder="Password Lama" value="{{ old('old_password') }}">
                                @error('old_password')<span class="help-block">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group @error('password') has-error @enderror">
                                <label for="password">Password Baru</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password Baru" value="{{ old('password') }}">
                                @error('password')<span class="help-block">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group @error('password_confirmation') has-error @enderror">
                                <label for="password_confirmation">Konfirmasi Password Baru</label>
                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Password Baru" value="{{ old('password_confirmation') }}">
                                @error('password_confirmation')<span class="help-block">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="/user" class="btn btn-default">Cancel</a>
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