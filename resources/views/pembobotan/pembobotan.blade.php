@extends('layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Pembobotan
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Pembobotan</li>
        </ol>
    </section>
@if (count($kriterias) == 0)
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
            <div class="alert alert-danger alert-dismissible ">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-warning"></i> Tentukan Kriteria terlebih dahulu!
            </div>
            </div>
        </div>
    </section>
@else
    <!-- Content Body -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Menetukan Perbandingan Berpasangan antara kriteria</h3>
                      <div class="box-tools">
                        <button id="cekkriteria" class="btn btn-sm btn-success btn-flat pull-right"><i class="fa fa-balance-scale"> </i> Periksa Kriteria</button>
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Kriteria</th>
                          @foreach($kriterias as $id_x => $kriteria)
                            <th>{{ $kriteria->nama_kriteria }}</th>
                          @endforeach
                        </tr>
                        </thead>
                        <tbody>
                            @php $xy = 0; @endphp
                            @foreach($kriterias as $id_y => $kriteria)
                                <tr>
                                    <th>{{ $kriteria->nama_kriteria }}</th>
                                    @foreach($kriterias as $id_x => $kriteria)
                                    @if ($id_y == $id_x)
                                        <td>
                                            {{-- <input type="text" class="form-control" name="coba" id="coba" value="[1] Sama penting dengan" readonly> --}}
                                            <select class="form-control skala" name="skala-{{ $id_y }}-{{ $id_x }}" id="skala-{{ $id_y }}-{{ $id_x }}" disabled>
                                                    <option value="1">[1] Sama penting dengan</option>
                                            </select>
                                        </td>
                                        @php $xy = $id_x; @endphp
                                    @else
                                        @if ($id_y > $xy)
                                            <td>
                                                <select class="form-control skala" name="skala-{{ $id_y }}-{{ $id_x }}" id="skala-{{ $id_y }}-{{ $id_x }}" disabled>
                                                    @foreach(SiteHelpers::PlusSkalaPerbandingan() as $skala)
                                                        <option data-y="{{ $id_y }}" data-x="{{ $id_x }}" data-id="{{ $skala['id'] }}" value="{{ $skala['skala'] }}" @if(session('dataKriteria')) {{ json_decode(session('dataKriteria'))[$id_y][$id_x] == $skala['skala'] ? 'selected' : '' }}@endif>{{ $skala['keterangan'] }}</option>
                                                    @endforeach
                                                    @foreach(SiteHelpers::MinSkalaPerbandingan() as $skala)
                                                        <option data-y="{{ $id_y }}" data-x="{{ $id_x }}" data-id="{{ $skala['id'] }}" value="{{ $skala['skala'] }}" @if(session('dataKriteria')) {{ json_decode(session('dataKriteria'))[$id_y][$id_x] == $skala['skala'] ? 'selected' : '' }}@endif>{{ $skala['keterangan'] }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        @else
                                            <td>
                                                <select class="form-control skala" name="skala-{{ $id_y }}-{{ $id_x }}" id="skala-{{ $id_y }}-{{ $id_x }}">
                                                    @foreach(SiteHelpers::PlusSkalaPerbandingan() as $skala)
                                                        <option data-y="{{ $id_y }}" data-x="{{ $id_x }}" data-id="{{ $skala['id'] }}" value="{{ $skala['skala'] }}" @if(session('dataKriteria')) {{ json_decode(session('dataKriteria'))[$id_y][$id_x] == $skala['skala'] ? 'selected' : '' }}@endif>{{ $skala['keterangan'] }}</option>
                                                    @endforeach
                                                    @foreach(SiteHelpers::MinSkalaPerbandingan() as $skala)
                                                        <option data-y="{{ $id_y }}" data-x="{{ $id_x }}" data-id="{{ $skala['id'] }}" value="{{ $skala['skala'] }}" @if(session('dataKriteria')) {{ json_decode(session('dataKriteria'))[$id_y][$id_x] == $skala['skala'] ? 'selected' : '' }}@endif>{{ $skala['keterangan'] }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        @endif    
                                    @endif    
                                    @endforeach
                                </tr>
                            @endforeach                          
                        </tbody>
                      </table>
                    </div>
                    <!-- /.box-body -->

                <div id="MatriksKriteria" @if(session('dataKriteria')) style="display:block" @else style="display:none" @endif>
                    @if(session('dataKriteria'))
                    <div class="page-header"></div>
                    <div class="box-header">
                      <h3 class="box-title">Matriks Perbandingan Kriteria</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>Kriteria</th>
                              @foreach($kriterias as $kriteria)
                                <th>{{ $kriteria->nama_kriteria }}</th>
                              @endforeach
                            </tr>
                            </thead>
                            <tbody>
                                @php
                                    if (Session::has('dataKriteria')) {
                                        $dataKriteria = json_decode(session('dataKriteria'));
                                    };

                                    if (Session::has('jumlahKriteria')) {
                                        $jumlahMatrixKriteria = session('jumlahKriteria');
                                    };
                                @endphp
                                @foreach($kriterias as $id_y => $kriteria)
                                    <tr>
                                        <th>{{ $kriteria->nama_kriteria }}</th>
                                        @foreach($kriterias as $id_x => $kriteria)
                                        <td>{{ $dataKriteria[$id_y][$id_x] }}</td>   
                                        @endforeach
                                    </tr>
                                @endforeach
                                <tr>
                                    <th>Jumlah</th>
                                    @foreach(session('jumlahKriteria') as $data)
                                        <th>{{ $data }}</th>
                                    @endforeach    
                                </tr>                          
                            </tbody>
                          </table>
                    </div>


                    <div class="page-header"></div>
                    <div class="box-header">
                      <h3 class="box-title">Normalisasi Matriks Perbandingan Kriteria</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>Kriteria</th>
                              @foreach($kriterias as $kriteria)
                                <th>{{ $kriteria->nama_kriteria }}</th>
                              @endforeach
                              <th>Prioritas</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php
                                    $dataNormalisasiKriteria = SiteHelpers::NormalisasiMatrix($dataKriteria, $jumlahMatrixKriteria);
                                    $namaSession = 'Kriteria';
                                    $labelKriteria = [];
                                    foreach ($kriterias as $value) {
                                        array_push($labelKriteria, $value->nama_kriteria);
                                    }
                                    $dataPrioritas = SiteHelpers::CreatePrioritas($dataNormalisasiKriteria, $namaSession, $labelKriteria);
                                @endphp
                                @foreach($kriterias as $id_y => $kriteria)
                                    <tr>
                                        <th>{{ $kriteria->nama_kriteria }}</th>
                                        @foreach($kriterias as $id_x => $kriteria)
                                        <td>{{ $dataNormalisasiKriteria[$id_y][$id_x] }}</td>   
                                        @endforeach
                                        <th>{{ $dataPrioritas[$id_y] }}</th>
                                    </tr>
                                @endforeach
                                {{-- <tr>
                                    <th>Jumlah</th>
                                    @foreach(session('jumlahKriteria') as $data)
                                        <th>{{ $data }}</th>
                                    @endforeach    
                                </tr> --}}
                            </tbody>
                          </table>
                    </div>


                    <div class="page-header"></div>
                    <div class="box-header">
                      <h3 class="box-title">Matriks Penjumlahan Setiap Baris</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>Kriteria</th>
                              @foreach($kriterias as $kriteria)
                                <th>{{ $kriteria->nama_kriteria }}</th>
                              @endforeach
                              <th>Jumlah</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php 
                                    $perkalianMatrix = SiteHelpers::CreatePerkalianMatrix($dataKriteria, $dataPrioritas);
                                    $jumlahPerBaris = SiteHelpers::CreateJumlahPerbaris($perkalianMatrix);
                                @endphp
                                @foreach($kriterias as $id_y => $kriteria)
                                    <tr>
                                        <th>{{ $kriteria->nama_kriteria }}</th>
                                        @foreach($kriterias as $id_x => $kriteria)
                                        <td>{{ $perkalianMatrix[$id_y][$id_x] }}</td>   
                                        @endforeach
                                        <th>{{ $jumlahPerBaris[$id_y] }}</th>
                                    </tr>
                                @endforeach
                                {{-- <tr>
                                    <th>Jumlah</th>
                                    @foreach(session('jumlahKriteria') as $data)
                                        <th>{{ $data }}</th>
                                    @endforeach    
                                </tr> --}}
                            </tbody>
                          </table>
                    </div>


                    <div class="page-header"></div>
                    <div class="box-header">
                      <h3 class="box-title">Perhitungan Rasio Konsistensi</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>Kriteria</th>
                              <th>Jumlah Perbaris</th>
                              <th>Prioritas</th>
                              <th>Hasil</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php
                                   $dataHasilPenjumlahan = SiteHelpers::CreateHasilPenjumlahan($dataPrioritas, $jumlahPerBaris) 
                                @endphp
                                @foreach($kriterias as $id_y => $kriteria)
                                    <tr>
                                        <th>{{ $kriteria->nama_kriteria }}</th>
                                        <td>{{ $jumlahPerBaris[$id_y] }}</td>
                                        <td>{{ $dataPrioritas[$id_y] }}</td>
                                        <td>{{ $dataHasilPenjumlahan['Jumlah'][$id_y] }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <th colspan="3" class="text-center">Jumlah</th>
                                    <th>{{ $dataHasilPenjumlahan['hasil'] }}</th>
                                </tr>
     
                            </tbody>
                          </table>
                          <br>
                          <div class="box-body">
            {{-- {{ dd(SiteHelpers::CreateCR($kriterias, $dataHasilPenjumlahan['hasil'])) }} --}}

                            <dl class="dl-horizontal">
                                @php
                                    $hasil = SiteHelpers::CreateCR($kriterias, $dataHasilPenjumlahan['hasil']);
                                @endphp
                              <dt style="text-align: left !important">n</dt>
                              <dd>{{ $hasil['n'] }}</dd>
                              <dt style="text-align: left !important">IR</dt>
                              <dd>{{ $hasil['ir'] }}</dd>
                              <dt style="text-align: left !important">Jumlah</dt>
                              <dd>{{ $hasil['jumlah'] }}</dd>
                              <dt style="text-align: left !important">Maks (Jumlah / n)</dt>
                              <dd>{{ $hasil['maks'] }}</dd>
                              <dt style="text-align: left !important">CI ((Maks - n) / (n - 1))</dt>
                              <dd>{{ $hasil['ci'] }}</dd>
                              <dt style="text-align: left !important">CR (CI / IR)</dt>
                              <dd>{{ $hasil['cr'] }}</dd>
                              <dt style="text-align: left !important">Konsistensi (CR < 0,1)</dt>
                              @if ($hasil['status'] === 'Konsisten')  
                                <dd><b><p class="text-green">{{ $hasil['status'] }} !</p></b></dd>
                                @else
                                <dd><b><p class="text-red">{{ $hasil['status'] }} !</p></b></dd>
                              @endif
                            </dl>
                          </div>
                    </div>
                    {{-- {{ dd($dataHasilPenjumlahan['hasil']) }} --}}

                    @endif
                </div>

                    <!-- /.box-body -->
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- DataTables -->
  <script src="vendor/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/plugins/datatables/dataTables.bootstrap.min.js"></script>

  <script type="text/javascript">

    $(function () {
        $(".skala").change(function (e) {
            const x = e.target.value;
            const krt_y = $(this).find(':selected').data("y");
            const krt_x = $(this).find(':selected').data("x");
            const data_id = $(this).find(':selected').data("id");
            if(x >= 1){
                if(x == 1){
                    $("#skala-"+krt_x+"-"+krt_y).children("option[value='1']").prop('selected',true);
                }else{
                    const idMinSkala = cekMinSkala(data_id);
                    $("#skala-"+krt_x+"-"+krt_y).children("option[value='"+idMinSkala[0].skala+"']").prop('selected',true);
                };
            }else{
                const idPlusSkala = cekPlusSkala(data_id);
                $("#skala-"+krt_x+"-"+krt_y).children("option[value='"+idPlusSkala[0].skala+"']").prop('selected',true);
            };
        });

        function cekMinSkala(id){
            const MinSkalaPerbandingan = {{ Js::from(SiteHelpers::MinSkalaPerbandingan()) }};
            var filter =  MinSkalaPerbandingan.filter(function(creature) {
                return creature.id == id;
            });
            return filter;
        };

        function cekPlusSkala(id){
            const PlusSkalaPerbandingan = {{ Js::from(SiteHelpers::PlusSkalaPerbandingan()) }};
            var filter =  PlusSkalaPerbandingan.filter(function(creature) {
                return creature.id == id;
            });
            return filter;
        };

        $('#cekkriteria').on('click', function(){
            const kriterias = {{ Js::from($kriterias) }};
            var dataArray = [];
            for(y=0; y<kriterias.length; ++y){
                data_y = [];
                for(x=0; x<kriterias.length; ++x){
                    const data_x = $("#skala-"+y+"-"+x).val();
                    data_y.push(data_x);
                };
                dataArray.push(data_y);
            };
            
            var jsonPost = JSON.stringify(dataArray);
            if(dataArray != ""){
                $.ajax({
                    url: '/pembobotan/cekkriteria',
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'data': jsonPost
                    },
                    success: function(response){
                        if (response.success) {
                            // console.log('berhasil');
                        }else{
                            // console.log('gagal');
                        }
                    },
                    error: function(xhr){
                        console.log(xhr.responseText);                        
                    }
                });
            }else{
                console.log('gagal');
            };
            location.reload();
            $("#MatriksKriteria").css("display", "block");
        });
    });
  </script>
@endsection