@extends('layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Penilaian
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="/penilaian"><i class="fa fa-pencil"></i> Penilaian</a></li>
            <li class="active"></i> Form Penilaian</li>
        </ol>
    </section>
    <!-- Content Body -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Form Penilaian <b>( {{ $alternatif->nama }} )</b></h3>
                    </div>
                    <!-- form start -->
                    <form action="/penilaian" method="post" enctype="multipart/form-data">
                        @csrf
                        @php $countData = count($kriterias) @endphp
                        <input type="hidden" class="form-control" name="alternatif_id" id="alternatif_id" value="{{ $alternatif->id }}">
                        <input type="hidden" class="form-control" name="countdata" id="countdata" value="{{ $countData }}">
                        @foreach($kriterias as $key => $kriteria)
                        <div class="box-body">
                            <input type="hidden" class="form-control" name="kriteria{{ $key }}" id="kriteria{{ $key }}" value="{{ $kriteria->id }}">
                            <div class="form-group @error('{{ $kriteria->nama_kriteria }}') has-error @enderror">
                                <label for="{{ $kriteria->nama_kriteria }}">{{ $kriteria->nama_kriteria }}</label>
                                @foreach($kriteria->subkriteria as $qq)
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="subkriteria{{ $key }}" id="{{ $qq->id }}" value="{{ $qq->id }}" required>
                                        {{ $qq->nama_sub_kriteria }}
                                    </label>
                                </div>
                                @endforeach                                
                                {{-- <input type="text" class="form-control" name="nama_kriteria" id="nama_kriteria" placeholder="Nama Kriteria" value="{{ old('nama_kriteria') }}"> --}}
                                @error('nama_kriteria')<span class="help-block">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        @endforeach
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="/penilaian" class="btn btn-default">Cancel</a>
                          </div>
                        </form>
                  </div>
            </div>
        </div>
    </section>
</div>
@endsection