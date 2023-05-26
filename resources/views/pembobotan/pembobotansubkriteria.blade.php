@extends('layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Pembobotan Subkriteria
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Pembobotan Subkriteria</li>
            {{-- {{ dd($matrixSubKriteria) }} --}}
        </ol>
    </section>
@if (count($subkriterias) == 0)
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
            <div class="col-md-12">
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                @foreach ($kriterias as $id => $kriteria)
                    <li class="{{ $id == 0 ? 'active' : '' }} toggle_link"><a href="#tab_{{ $id }}" data-toggle="tab">{{ $kriteria->nama_kriteria }}</a></li>
                @endforeach
                  
                  {{-- <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li> --}}
                </ul>
                <div class="tab-content">
                    @foreach ($kriterias as $i => $kriteria)
                    @php
                        $dataSubkriteria = $subkriterias->where('kriteria_id', $kriteria->id);
                        $countSubkriteria = count($dataSubkriteria);
                        if (Session::has($kriteria->nama_kriteria)) {
                            $matrixSubKriteria = json_decode(session($kriteria->nama_kriteria));
                        };

                        if (Session::has('jumlahSubKriteria_'.$kriteria->nama_kriteria)) {
                            $jumlahMatrixSubKriteria = session('jumlahSubKriteria_'.$kriteria->nama_kriteria);
                        };

                    @endphp
                    <div class="tab-pane {{ $i == 0 ? 'active' : '' }}" id="tab_{{ $i }}">
                        <div class="box-header">
                            <h3 class="box-title">Menetukan Perbandingan Berpasangan antara Subkriteria <b>({{ $kriteria->nama_kriteria }})</b></h3>
                            <div class="box-tools">
                              <button value="{{ $kriteria->id }}" data-countSubKriteria="{{ $countSubkriteria }}" data-namakriteria="{{ $kriteria->nama_kriteria }}" class="btn btn-sm btn-success btn-flat pull-right ceksubkriteria"><i class="fa fa-balance-scale"> </i> Periksa</button>
                            </div>
                        </div>
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Subkriteria</th>
                                        @foreach ($dataSubkriteria as $item)
                                            <th>{{ $item->nama_sub_kriteria }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $id_y = 0; @endphp
                                    @foreach ($dataSubkriteria as $subkriteria)    
                                    <tr>
                                        <th>{{ $subkriteria->nama_sub_kriteria }}</th>
                                        @php $id_x = 0; @endphp
                                        @foreach ($dataSubkriteria as $item)
                                        @if ($id_y == $id_x)
                                            <td>
                                                {{-- <input type="text" class="form-control" name="coba" id="coba" value="[1] Sama penting dengan" readonly> --}}
                                                <select class="form-control skala" name="skala-{{ $item->kriteria_id }}-{{ $id_y }}-{{ $id_x }}" id="skala-{{ $item->kriteria_id }}-{{ $id_y }}-{{ $id_x }}" disabled>
                                                        <option value="1">[1] Sama penting dengan</option>
                                                </select>
                                            </td>
                                            @php $xy = $id_x; @endphp
                                        @else
                                            @if ($id_y > $xy)
                                                <td>
                                                    <select class="form-control skala" name="skala-{{ $item->kriteria_id }}-{{ $id_y }}-{{ $id_x }}" id="skala-{{ $item->kriteria_id }}-{{ $id_y }}-{{ $id_x }}" disabled>
                                                        @foreach(SiteHelpers::PlusSkalaPerbandingan() as $skala)
                                                            <option data-kriteriaid="{{ $item->kriteria_id }}" data-y="{{ $id_y }}" data-x="{{ $id_x }}" data-id="{{ $skala['id'] }}" value="{{ $skala['skala'] }}" @if(Session::has($kriteria->nama_kriteria)) {{ $matrixSubKriteria[$id_y][$id_x] == $skala['skala'] ? 'selected' : '' }}@endif>{{ $skala['keterangan'] }}</option>
                                                        @endforeach
                                                        @foreach(SiteHelpers::MinSkalaPerbandingan() as $skala)
                                                            <option data-kriteriaid="{{ $item->kriteria_id }}" data-y="{{ $id_y }}" data-x="{{ $id_x }}" data-id="{{ $skala['id'] }}" value="{{ $skala['skala'] }}" @if(Session::has($kriteria->nama_kriteria)) {{ $matrixSubKriteria[$id_y][$id_x] == $skala['skala'] ? 'selected' : '' }}@endif>{{ $skala['keterangan'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            @else
                                                <td>
                                                    <select class="form-control skala" name="skala-{{ $item->kriteria_id }}-{{ $id_y }}-{{ $id_x }}" id="skala-{{ $item->kriteria_id }}-{{ $id_y }}-{{ $id_x }}">
                                                        @foreach(SiteHelpers::PlusSkalaPerbandingan() as $skala)
                                                            <option data-kriteriaid="{{ $item->kriteria_id }}" data-y="{{ $id_y }}" data-x="{{ $id_x }}" data-id="{{ $skala['id'] }}" value="{{ $skala['skala'] }}" @if(Session::has($kriteria->nama_kriteria)) {{ $matrixSubKriteria[$id_y][$id_x] == $skala['skala'] ? 'selected' : '' }}@endif>{{ $skala['keterangan'] }}</option>
                                                        @endforeach
                                                        @foreach(SiteHelpers::MinSkalaPerbandingan() as $skala)
                                                            <option data-kriteriaid="{{ $item->kriteria_id }}" data-y="{{ $id_y }}" data-x="{{ $id_x }}" data-id="{{ $skala['id'] }}" value="{{ $skala['skala'] }}" @if(Session::has($kriteria->nama_kriteria)) {{ $matrixSubKriteria[$id_y][$id_x] == $skala['skala'] ? 'selected' : '' }}@endif>{{ $skala['keterangan'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            @endif    
                                        @endif
                                        @php $id_x++ @endphp
                                        @endforeach
                                    </tr> 
                                    @php $id_y++ @endphp                       
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div id="MatriksKriteria" @if(session($kriteria->nama_kriteria)) style="display:block" @else style="display:none" @endif>
                        @if (session($kriteria->nama_kriteria))
                            <div class="page-header"></div>
                            <div class="box-header">
                                <h3 class="box-title">Matriks Perbandingan Kriteria</h3>
                            </div>
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                      <th>Subkriteria</th>
                                      @foreach($dataSubkriteria as $subkriteria)
                                        <th>{{ $subkriteria->nama_sub_kriteria }}</th>
                                      @endforeach
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @php $niliaId_y = 0; @endphp
                                        @foreach($dataSubkriteria as $subkriteria)
                                            <tr>
                                                <th>{{ $subkriteria->nama_sub_kriteria }}</th>
                                                @php $niliaId_x = 0; @endphp
                                                @foreach($dataSubkriteria as $subkriteria)
                                                <td>{{ $matrixSubKriteria[$niliaId_y][$niliaId_x] }}</td>
                                                @php $niliaId_x++; @endphp   
                                                @endforeach
                                            </tr>
                                            @php $niliaId_y++; @endphp  
                                        @endforeach
                                        <tr>
                                            <th>Jumlah</th>
                                            @foreach($jumlahMatrixSubKriteria as $data)
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
                                        <th>Subkriteria</th>
                                        @foreach($dataSubkriteria as $subkriteria)
                                        <th>{{ $subkriteria->nama_sub_kriteria }}</th>
                                        @endforeach
                                    <th>Prioritas</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $dataNormalisasiSubKriteria = SiteHelpers::NormalisasiMatrix($matrixSubKriteria, $jumlahMatrixSubKriteria);
                                            $labelKriteria = [];
                                            foreach ($dataSubkriteria as $value) {
                                                array_push($labelKriteria, $value->nama_sub_kriteria);
                                            }
                                            $dataPrioritas = SiteHelpers::CreatePrioritas($dataNormalisasiSubKriteria, $kriteria->nama_kriteria, $labelKriteria);
                                        @endphp
                                        @php $norId_y = 0; @endphp
                                        @foreach($dataSubkriteria as $subkriteria)
                                            <tr>
                                                <th>{{ $subkriteria->nama_sub_kriteria }}</th>
                                                @php $norId_x = 0; @endphp
                                                @foreach($dataSubkriteria as $subkriteria)
                                                <td>{{ $dataNormalisasiSubKriteria[$norId_y][$norId_x] }}</td>   
                                                @php $norId_x++; @endphp
                                                @endforeach
                                                <th>{{ $dataPrioritas[$norId_y] }}</th>
                                            </tr>
                                            @php $norId_y++; @endphp
                                        @endforeach
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
                                        <th>Subkriteria</th>
                                        @foreach($dataSubkriteria as $subkriteria)
                                            <th>{{ $subkriteria->nama_sub_kriteria }}</th>
                                        @endforeach
                                        <th>Jumlah</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @php 
                                            $perkalianMatrix = SiteHelpers::CreatePerkalianMatrix($matrixSubKriteria, $dataPrioritas);
                                            $jumlahPerBaris = SiteHelpers::CreateJumlahPerbaris($perkalianMatrix);
                                        @endphp
                                        @php $jmlId_y = 0; @endphp
                                        @foreach($dataSubkriteria as $subkriteria)
                                            <tr>
                                                <th>{{ $subkriteria->nama_sub_kriteria }}</th>
                                                @php $jmlId_x = 0; @endphp
                                                @foreach($dataSubkriteria as $subkriteria)
                                                <td>{{ $perkalianMatrix[$jmlId_y][$jmlId_x] }}</td> 
                                                @php $jmlId_x++; @endphp  
                                                @endforeach
                                                <th>{{ $jumlahPerBaris[$jmlId_y] }}</th>
                                            </tr>
                                            @php $jmlId_y++; @endphp
                                        @endforeach
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
                                    <th>Subriteria</th>
                                    <th>Jumlah Perbaris</th>
                                    <th>Prioritas</th>
                                    <th>Hasil</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $dataHasilPenjumlahan = SiteHelpers::CreateHasilPenjumlahan($dataPrioritas, $jumlahPerBaris); 
                                            // dd($jumlahPerBaris);
                                            $rkId = 0;
                                        @endphp
                                        
                                        @foreach($dataSubkriteria as $subkriteria)
                                            <tr>
                                                <th>{{ $subkriteria->nama_sub_kriteria }}</th>
                                                <td>{{ $jumlahPerBaris[$rkId] }}</td>
                                                <td>{{ $dataPrioritas[$rkId] }}</td>
                                                <td>{{ $dataHasilPenjumlahan['Jumlah'][$rkId] }}</td>
                                            </tr>
                                            @php $rkId++; @endphp
                                        @endforeach
                                        <tr>
                                            <th colspan="3" class="text-center">Jumlah</th>
                                            <th>{{ $dataHasilPenjumlahan['hasil'] }}</th>
                                        </tr>
            
                                    </tbody>
                                </table>
                                <br>
                                <div class="box-body">
                                    <dl class="dl-horizontal">
                                        @php
                                            $hasil = SiteHelpers::CreateCR($dataSubkriteria, $dataHasilPenjumlahan['hasil']);
                
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
                            @endif
                        </div>
                    </div>
                    @endforeach
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div>
              <!-- nav-tabs-custom -->
            </div>
            <!-- /.col -->
          </div>
    </section>
@endif       
</div>
@endsection

@section('js_script')
  <!-- jQuery 2.2.3 -->
  {{-- <script src="vendor/plugins/jQuery/jquery-2.2.3.min.js"></script> --}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- DataTables -->
  {{-- <script src="vendor/plugins/datatables/jquery.dataTables.min.js"></script> --}}
  {{-- <script src="vendor/plugins/datatables/dataTables.bootstrap.min.js"></script> --}}

  <script type="text/javascript">
    $(function () {
        var url = window.location.href;
        var activeTab = url.substring(url.indexOf("#") + 1);
        $('a[href="#' + activeTab + '"]').tab('show');

        $(".skala").change(function (e) {
            const x = e.target.value;
            const krt_y = $(this).find(':selected').data("y");
            const krt_x = $(this).find(':selected').data("x");
            const krt_id = $(this).find(':selected').data("kriteriaid");
            const data_id = $(this).find(':selected').data("id");
            // console.log(data_id);
            if(x >= 1){
                if(x == 1){
                    $("#skala-"+krt_id+"-"+krt_x+"-"+krt_y).children("option[value='1']").prop('selected',true);
                }else{
                    const idMinSkala = cekMinSkala(data_id);
                    $("#skala-"+krt_id+"-"+krt_x+"-"+krt_y).children("option[value='"+idMinSkala[0].skala+"']").prop('selected',true);
                };
            }else{
                const idPlusSkala = cekPlusSkala(data_id);
                $("#skala-"+krt_id+"-"+krt_x+"-"+krt_y).children("option[value='"+idPlusSkala[0].skala+"']").prop('selected',true);
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


        $('.ceksubkriteria').on('click', function(e){
            const krt_id = e.target.value;
            const countSubkriteria = e.target.dataset.countsubkriteria;
            const namaKriteria = e.target.dataset.namakriteria;
            var dataArray = [];
            for(y=0; y<countSubkriteria; ++y){
                data_y = [];
                for(x=0; x<countSubkriteria; ++x){
                    const data_x = $("#skala-"+krt_id+"-"+y+"-"+x).val();
                    data_y.push(data_x);
                };
                dataArray.push(data_y);
            };            
            
            var jsonPost = JSON.stringify(dataArray);
            if(dataArray != ""){
                $.ajax({
                    url: '/pembobotan/ceksubkriteria',
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'namakriteria': namaKriteria,
                        'data': jsonPost
                    },
                    success: function(response){
                        // console.log(response);
                    },
                    error: function(xhr){
                        // console.log(xhr.responseText);                        
                    }
                });
            }else{
                console.log('gagal');
            };
            const linkTab = $('.active.toggle_link a').attr('href');
            window.location.href = '/pembobotan/subkriteria'+linkTab;
            location.reload();
            $("#MatriksKriteria").css("display", "block");
        });
    });
  </script>
@endsection