@extends('layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Alternatif
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="/alternatif"><i class="fa fa-pencil"></i> Alternatif</a></li>
            <li class="active"></i> Form Kriteria</li>
        </ol>
    </section>
    <!-- Content Body -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Form Tambah Kriteria</h3>
                    </div>
                    <!-- form start -->
                    <form action="/alternatif" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group @error('nik') has-error @enderror">
                                <label for="nik">NIK</label>
                                <input type="number" class="form-control" name="nik" id="nik" placeholder="Nomor Induk Kependudukan" value="{{ old('nik') }}">
                                @error('nik')<span class="help-block">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group @error('nama') has-error @enderror">
                                <label for="nama">Nama Alternatif</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Alternatif" value="{{ old('nama') }}">
                                @error('nama')<span class="help-block">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group @error('alamat') has-error @enderror">
                                <label for="exampleInputPassword1">Keterangan</label>
                                <textarea type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat">@if(old('alamat')){{ old('alamat') }}@endif</textarea>
                                @error('alamat')<span class="help-block">{{ $message }}</span> @enderror
                            </div> 
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="/alternatif" class="btn btn-default">Cancel</a>
                          </div>
                        </form>
                  </div>
            </div>
        </div>
    </section>
</div>
@endsection