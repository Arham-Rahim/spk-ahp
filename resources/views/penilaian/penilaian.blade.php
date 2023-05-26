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
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Penilaian</li>
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
                      <h3 class="box-title">Data Yang Belum Dinilai</h3>
                      
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>No</th>
                          <th>Alternatif</th>
                          @foreach($kriteria as $kr)
                            <th>{{ $kr->nama_kriteria }}</th>
                          @endforeach
                          <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach($alternatifs as $alternatif)
                            @php $cekAlternatif = $penilaians->where('alternatif_id', $alternatif->id);@endphp
                            @if(count($cekAlternatif) == 0)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $alternatif->nama }}</td>
                                @php $count = count($kriteria) @endphp
                                @for($i = 0; $i < $count; $i++)
                                    <td>-</td>
                                @endfor
                                <td>
                                    <a href="/penilaian/{{ $alternatif->id }}/nilai" class="btn btn-primary btn-sm" data-widget="Nilai" data-toggle="tooltip" title="Nilai"><i class="fa fa-check-square-o"></i> Nilai</a>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                          
                        </tbody>
                      </table>
                    </div>
                    <!-- /.box-body -->
                  </div>
            </div>
        </div>
      </section>
      
      
      <section class="content">
        <div class="row">
            <div class="col-lg-12">
              @if(session()->has('success1'))
              <div class="alert alert-success alert-dismissible ">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-warning"></i> {{ session('success1') }}
              </div>
              @endif
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Data Hasil Penilaian</h3>
                      <div class="box-tools">
                        {{-- <button id="analisis" class="btn btn-sm btn-success btn-flat pull-right"><i class="fa fa-bar-chart-o"> </i> Analisis</button> --}}
                      </div>
                      <div class="box-tools">
                        {{-- <a href="/penilaian/create" class="btn btn-block btn-primary"><i class="fa fa-plus"> </i>  Data Baru</a> --}}
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <table id="example2" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>No</th>
                          <th>Alternatif</th>
                          @foreach($kriteria as $kr)
                            <th>{{ $kr->nama_kriteria }}</th>
                          @endforeach
                          <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                          @php $no = 1; $allg = $penilaians->groupBy('alternatif_id'); @endphp
                          @foreach($allg as $key_y => $b)
                              <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $b[0]->alternatif->nama }}</td>
                                @foreach($kriteria as $i => $kr)
                                  <td>{{ $b[$i]->subkriteria->nama_sub_kriteria }}</td>
                                @endforeach
                                <td>
                                  <a href="/penilaian/{{ $b[0]->alternatif_id }}/edit" class="btn btn-success btn-sm" data-widget="Edit" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                  
                                  <form action="/penilaian/{{ $b[0]->alternatif_id }}" method="post" class="inline">
                                  @method('delete')
                                  @csrf
                                  <button type="submit" class="btn btn-danger btn-sm" data-widget="Delete" data-toggle="tooltip" title="Delete" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                  <i class="fa fa-trash"></i></button>
                                  </form>
                                </td>
                              </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <!-- /.box-body -->
                  </div>
            </div>
        </div>
      </section> 
      @php

        $namaKriteria = ['Prio_Kriteria'];
        foreach ($kriteria as $key => $value) {
          array_push($namaKriteria, 'Prio_'.$value->nama_kriteria);
        };

        $sessionNames = $namaKriteria;

        $foundSessions = [];
        foreach ($sessionNames as $sessionName) {
            if (session()->has($sessionName)) {
                $foundSessions[] = $sessionName;
            };
        };

      @endphp
      @if (count($foundSessions) === count($sessionNames))
      @php
        $hasilPenilaian = SiteHelpers::hasilAHP();
        $hasilAkhir = SiteHelpers::hasilAkhirAHP();
      @endphp
      <section class="content" id="contentHasilAnalisis">
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Data Hasil Analisis AHP</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive text-nowrap">
                      <table id="example2" class="table table-bordered table-striped table-responsive">
                        <thead>
                        <tr>
                          <th>No</th>
                          <th>Alternatif</th>
                          @foreach($kriteria as $kr)
                            <th>{{ $kr->nama_kriteria }}</th>
                          @endforeach
                          <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                          @php
                              $no = 1;
                              $y = 0;
                          @endphp
                          @foreach ($allg as $item)    
                          <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item[0]->alternatif->nama }}</td>
                            @for ($i = 0; $i < count($kriteria); $i++)
                              <td>{{ $hasilPenilaian[$y][$i] }}</td>
                            @endfor
                            <td>{{ $hasilAkhir[$y] }}</td>
                          </tr>
                          @php
                              $y++
                          @endphp
                          @endforeach
                         
                        </tbody>
                      </table>
                    </div>
                    <!-- /.box-body -->
                  </div>
            </div>
        </div>
      </section>



      @php
        $hasilSMART = SiteHelpers::hasilSMART();
        $hasilAkhirSMART = SiteHelpers::hasilAkhirSMART();
      @endphp

      <section class="content" id="contentHasilAnalisis">
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Data Hasil Analisis SMART</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive text-nowrap">
                      <table id="example2" class="table table-bordered table-striped table-responsive">
                        <thead>
                        <tr>
                          <th>No</th>
                          <th>Alternatif</th>
                          @foreach($kriteria as $kr)
                            <th>{{ $kr->nama_kriteria }}</th>
                          @endforeach
                          <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                          @php
                              $no = 1;
                              $y = 0;
                          @endphp
                          @foreach ($allg as $item)    
                          <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item[0]->alternatif->nama }}</td>
                            @for ($i = 0; $i < count($kriteria); $i++)
                              <td>{{ $hasilSMART[$y][$i] }}</td>
                            @endfor
                            <td>{{ $hasilAkhirSMART[$y] }}</td>
                          </tr>
                          @php
                              $y++
                          @endphp
                          @endforeach
                         
                        </tbody>
                      </table>
                    </div>
                    <!-- /.box-body -->
                  </div>
            </div>
        </div>
      </section>
      @else
      <section class="content" id="contentHasilAnalisis">
        <div class="row">
            <div class="col-lg-12">
              <div class="alert alert-danger alert-dismissible ">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-warning"></i> Tentukan terlebih dahulu bobo Kriteria dan Subkriteria!
              </div>
            </div>
        </div>
      </section>
      @endif
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
      // $("#example2").DataTable();

      $('#analisis').on('click', function(){
            location.reload();
            $("#contentHasilAnalisis").css("display", "block");
        });
    });
    
  </script>
@endsection