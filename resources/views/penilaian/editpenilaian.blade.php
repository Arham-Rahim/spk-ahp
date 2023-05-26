@extends('layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Penilaian
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="/penilaian"><i class="fa fa-pencil"></i> Penilaian</a></li>
            <li class="active"></i> Edit Penilaian</li>
        </ol>
    </section>
    <!-- Content Body -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Form Edit Penilaian <b>( {{ $penilaians[0]->alternatif->nama }} )</b></h3>
                    </div>
                    <!-- form start -->
                    <form action="/penilaian/{{ $penilaians[0]->alternatif_id }}" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        @php $countData = count($kriterias) @endphp
                        <input type="hidden" class="form-control" name="alternatif_id" id="alternatif_id" value="{{ $penilaians[0]->alternatif_id }}">
                        <input type="hidden" class="form-control" name="countdata" id="countdata" value="{{ $countData }}">
                        @foreach($kriterias as $key => $kriteria)
                        <div class="box-body">
                            <input type="hidden" class="form-control" name="kriteria{{ $key }}" id="kriteria{{ $key }}" value="{{ $kriteria->id }}">
                            <input type="hidden" class="form-control" name="penilaian{{ $key }}" id="penilaian{{ $key }}" value="{{ $penilaians[$key]->id }}">
                            <div class="form-group @error('{{ $kriteria->nama_kriteria }}') has-error @enderror">
                                <label for="{{ $kriteria->nama_kriteria }}">{{ $kriteria->nama_kriteria }}</label>
                                @foreach($kriteria->subkriteria as $qq)
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="subkriteria{{ $key }}" id="{{ $qq->id }}" value="{{ $qq->id }}" {{ $penilaians[$key]->subkriteria_id == $qq->id ? 'checked' : '' }} required>
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