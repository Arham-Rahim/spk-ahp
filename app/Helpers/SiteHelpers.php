<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Session;
use App\Models\Penilaian;
use App\Models\Kriteria;

class SiteHelpers{
    public static function cek_akses(){
        return 'ok';
    }

    public static function PlusSkalaPerbandingan(){
        $skala = [
            [
                'id' => '0',
                'keterangan' => '[1] Sama penting dengan',
                'skala' => 1
            ],
            [
                'id' => '1',
                'keterangan' => '[2] Mendekati sedikit lebih penting dari',
                'skala' => 2
            ],
            [
                'id' => '2',
                'keterangan' => '[3] Sedikit lebih penting dari',
                'skala' => 3
            ],
            [
                'id' => '3',
                'keterangan' => '[4] Mendekati lebih penting dari',
                'skala' => 4
            ],
            [
                'id' => '4',
                'keterangan' => '[5] Lebih penting dari',
                'skala' => 5
            ],
            [
                'id' => '5',
                'keterangan' => '[6] Mendekati sangat penting dari',
                'skala' => 6
            ],
            [
                'id' => '6',
                'keterangan' => '[7] Sangat penting dari',
                'skala' => 7
            ],
            [
                'id' => '7',
                'keterangan' => '[8] Mendekati mutlak sangat penting dari',
                'skala' => 8
            ],
            [
                'id' => '8',
                'keterangan' => '[9] Mutlak sangat penting dari',
                'skala' => 9
            ]

        ];
        return $skala;
    }

    public static function MinSkalaPerbandingan(){
        $skala = [
            [
                'id' => '1',
                'keterangan' => '[1/2] Tidak Mendekati sedikit lebih penting dari',
                'skala' => 0.5
            ],
            [
                'id' => '2',
                'keterangan' => '[1/3] Tidak Sedikit lebih penting dari',
                'skala' => 0.333333333
            ],
            [
                'id' => '3',
                'keterangan' => '[1/4] Tidak Mendekati lebih penting dari',
                'skala' => 0.25
            ],
            [
                'id' => '4',
                'keterangan' => '[1/5] Tidak Lebih penting dari',
                'skala' => 0.2
            ],
            [
                'id' => '5',
                'keterangan' => '[1/6] Tidak Mendekati sangat penting dari',
                'skala' => 0.166666667
            ],
            [
                'id' => '6',
                'keterangan' => '[1/7] Tidak Sangat penting dari',
                'skala' => 0.142857143
            ],
            [
                'id' => '7',
                'keterangan' => '[1/8] Tidak Mendekati mutlak sangat penting dari',
                'skala' => 0.125
            ],
            [
                'id' => '8',
                'keterangan' => '[1/9] Tidak Mutlak sangat penting dari',
                'skala' => 0,111111111
            ]

        ];
        return $skala;
    }

    public static function IR($matrix){
        $skala = [
            1 => 0.00,
            2 => 0.00,
            3 => 0.58,
            4 => 0.90,
            5 => 1.12,
            6 => 1.24,
            7 => 1.32,
            8 => 1.41,
            9 => 1.45,
            10 => 1.49,
            11 => 1.51,
            12 => 1.48,
            12 => 1.56,
            13 => 1.56,
            14 => 1.57,
            15 => 1.59,
        ];
        $data = $skala[$matrix];
        return $data;
    }

    // public static function IR(){
    //     $skala = [
    //         [
    //             'UkuranMatrix' => 1,
    //             'Nilai' => 0.00
    //         ],
    //         [
    //             'UkuranMatrix' => 2,
    //             'Nilai' => 0.00
    //         ],
    //         [
    //             'UkuranMatrix' => 3,
    //             'Nilai' => 0.58
    //         ],
    //         [
    //             'UkuranMatrix' => 4,
    //             'Nilai' => 0.90
    //         ],
    //         [
    //             'UkuranMatrix' => 5,
    //             'Nilai' => 1.12
    //         ],
    //         [
    //             'UkuranMatrix' => 6,
    //             'Nilai' => 1.24
    //         ],
    //         [
    //             'UkuranMatrix' => 7,
    //             'Nilai' => 1.32
    //         ],
    //         [
    //             'UkuranMatrix' => 8,
    //             'Nilai' => 1.41
    //         ],
    //         [
    //             'UkuranMatrix' => 9,
    //             'Nilai' => 1.45
    //         ],
    //         [
    //             'UkuranMatrix' => 10,
    //             'Nilai' => 1.49
    //         ],
    //         [
    //             'UkuranMatrix' => 11,
    //             'Nilai' => 1.51
    //         ],
    //         [
    //             'UkuranMatrix' => 12,
    //             'Nilai' => 1.48
    //         ],
    //         [
    //             'UkuranMatrix' => 12,
    //             'Nilai' => 1.56
    //         ],
    //         [
    //             'UkuranMatrix' => 13,
    //             'Nilai' => 1.56
    //         ],
    //         [
    //             'UkuranMatrix' => 14,
    //             'Nilai' => 1.57
    //         ],
    //         [
    //             'UkuranMatrix' => 15,
    //             'Nilai' => 1.59
    //         ],
            

    //     ];
    //     return $skala;
    // }

    public static function CreateBlankArray($data)
    {
        $jumlah_baris = count($data);
        $jumlah_kolom = count($data[0]);
        $jumlah = [];
        for ($i=0; $i < $jumlah_kolom; $i++) { 
            array_push($jumlah, 0);
        }
        return $jumlah;
    }

    public static function NormalisasiMatrix($dataMatrix, $jmlMatrix)
    {
        $countMatrix = count($dataMatrix);
        $noralisasiMatrix = [];
        for ($y=0; $y < $countMatrix; $y++) { 
            $data_y = [];
            for ($x=0; $x < $countMatrix; $x++) { 
                $data = $dataMatrix[$y][$x];
                $jml = $jmlMatrix[$x];
                $nilai = (int)$data / (int)$jml;
                array_push($data_y, $nilai);
            };
            array_push($noralisasiMatrix, $data_y);
        };
        return $noralisasiMatrix;
    }

    public static function CreatePrioritas($data, $namaSession, $db)
    { 
        $rata_rata = [];
        foreach ($data as $row) {
            $sum = array_sum($row);
            $count = count($row);
            $average = $sum / $count;
            $rata_rata[] = number_format($average, 4);
        }
        if (isset($rata_rata)) {
            $dataPrioritas = [];
            for ($i=0; $i < count($rata_rata); $i++) { 
                array_push($dataPrioritas, [
                    'lebel' => $db[$i],
                    'nilia' => $rata_rata[$i]
                ]);
            }
            
            Session::put('Prio_'.$namaSession, $dataPrioritas);
            return $rata_rata;
        }
    }

    public static function CreatePerkalianMatrix($data, $prioritas)
    { 
        $dataMatrix = $data;
        $countMatrix = count($dataMatrix);
        $PerkalianMatrix = [];
        for ($y=0; $y < $countMatrix; $y++) { 
            $data_y = [];
            for ($x=0; $x < $countMatrix; $x++) { 
                $nilai = number_format($dataMatrix[$y][$x] * $prioritas[$y], 4);
                array_push($data_y, $nilai);
            };
            array_push($PerkalianMatrix, $data_y);
        };
        return $PerkalianMatrix;
    }


    public static function CreateJumlahPerbaris($data)
    {
        $jumlah = [];
        foreach ($data as $row) {
            $sum = array_sum($row);
            $jumlah[] = $sum;
        }
        if (isset($jumlah)) {
            return $jumlah;
        }
    }

    public static function CreateHasilPenjumlahan($dataPriritas, $dataJumlahBaris)
    {
        $priritas = ['Prioritas' => $dataPriritas];
        $jumlahBaris = ['JumlahBaris' => $dataJumlahBaris];
        $jumlah = [];
        if (count($dataPriritas) == count($dataJumlahBaris)) {
            for ($i=0; $i < count($dataPriritas); $i++) { 
                $sum = $dataPriritas[$i] + $dataJumlahBaris[$i];
                array_push($jumlah, $sum);
            };
        };
        $hasil = ['Jumlah' => $jumlah];
        $jumlah = ['hasil' => array_sum($jumlah)];
        $coba = $priritas + $jumlahBaris + $hasil + $jumlah;
        return $coba; 
    }

    public static function CreateCR($data, $jumlah){
        $n = count($data);
        $ir = SiteHelpers::IR($n);
        $maks = $jumlah/$n;
        $ci = (($maks-$n)/($n-1));
        if ($ir > 0) {
            $cr = $ci/$ir;
        }else{
            $cr = 0;
        };
        
        if($cr < 0.1){
            $konsitensi = 'Konsisten';
        }else{
            $konsitensi = 'Tidak Kosisten';
        };
        $hasil = [
            'n' => $n,
            'ir' => $ir,
            'jumlah' => $jumlah,
            'maks' => $maks,
            'ci' => $ci,
            'cr' => $cr,
            'status' => $konsitensi
        ];
        return $hasil;
    }



    public static function HasilAHP(){
        $data = Penilaian::with(['alternatif','kriteria','subkriteria'])->get();
        $allg = $data->groupBy('alternatif_id');
        $kriterias = Kriteria::all();
        $penilaians = [];
        foreach($allg as $key_y => $penilaian){
            $penilaian_x = [];
            foreach($kriterias as $key_x => $kriteria){
                $sesKriteria = session('Prio_Kriteria');
                if ($sesKriteria[$key_x]['lebel'] == $penilaian[$key_x]->kriteria->nama_kriteria) {
                    $prioritasKriteria = $sesKriteria[$key_x]['nilia'];
                };

                $sesSubKriteria = session('Prio_'.$penilaian[$key_x]->kriteria->nama_kriteria);

                foreach($sesSubKriteria as $ses){
                    if ($ses['lebel'] == $penilaian[$key_x]->subkriteria->nama_sub_kriteria) {
                        $prioritasSubKriteria = $ses['nilia'];
                    };
                };

                $nilaiAkhir = number_format($prioritasKriteria * $prioritasSubKriteria, 4);
                
                array_push($penilaian_x,  $nilaiAkhir);
                // array_push($penilaian_x, $penilaian[$key_x]->subkriteria->nama_sub_kriteria);
            };
            array_push($penilaians, $penilaian_x);
        };
        return  $penilaians;
    }

    public static function HasilAkhirAHP(){
        $data = SiteHelpers::hasilAHP();
        $hasil = [];
        foreach ($data as $row) {
            $sum = number_format(array_sum($row), 4);
            $hasil[] = $sum;
        }
        return  $hasil;
    }

    public static function HasilSMART(){
        $data = SiteHelpers::hasilAHP();
        $bobot = Kriteria::all();
        $hasil = [];
        foreach($data as $rows){
            $hasilx = [];
            foreach($rows as $ky => $row){
                $nilia = $row * $bobot[$ky]['bobot_kriteria'];
                array_push($hasilx,  $nilia);
            }
            
            array_push($hasil,  $hasilx);
        }

        return $hasil;
    }

    // public static function HasilSMART(){
    //     $data = SiteHelpers::hasilAHP();
    //     $bobot = Kriteria::all();
    //     $hasil = [];
    //     foreach($data as $ky => $rows){
    //         $hasilx = [];
    //         foreach($rows as $row){
    //             $nilia = $row * $bobot[$ky]['bobot_kriteria'];
    //             array_push($hasilx,  $nilia);
    //         }
    //         array_push($hasil,  $hasilx);
    //     }

    //     return $hasil;
    // }

    public static function HasilAkhirSMART(){
        $data = SiteHelpers::HasilSMART();
        $hasil = [];
        foreach ($data as $row) {
            $sum = array_sum($row);
            $hasil[] = $sum;
        }
        return  $hasil;
    }



}