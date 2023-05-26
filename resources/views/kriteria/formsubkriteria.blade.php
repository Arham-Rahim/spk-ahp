@extends('layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sub Kriteria
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="/kriteria"><i class="fa fa-pencil"></i> Kriteria</a></li>
            <li class="active"></i> Form Sub Kriteria</li>
        </ol>
    </section>
    <!-- Content Body -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Form Tambah Sub Kriteria <b>({{ $kriteria->nama_kriteria }})</b></h3>
                    </div>
                    <!-- form start -->
                    <form action="/subkriteria" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="kriteria_id" id="kriteria_id" value="{{ $kriteria->id }}">
                        <div class="box-body">
                            <div class="form-group @error('nama_sub_kriteria') has-error @enderror">
                                <label for="nama_sub_kriteria">Nama Sub Kriteria</label>
                                <input type="text" class="form-control" name="nama_sub_kriteria" id="nama_sub_kriteria" placeholder="Nama Kriteria" value="{{ old('nama_sub_kriteria') }}">
                                @error('nama_sub_kriteria')<span class="help-block">{{ $message }}</span> @enderror
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