<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Subkriteria;

use App\Models\Pembobotan;
use App\Helpers\SiteHelpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class PembobotansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pembobotan.pembobotan', [
            "title" => "Pembobotan",
            "kriterias" => Kriteria::all()
        ]);
    }

    public function bobotsubkriteria()
    {
        return view('pembobotan.pembobotansubkriteria', [
            "title" => "Pembobotan Subkriteria",
            "kriterias" => Kriteria::all(),
            "subkriterias" => Subkriteria::with(['kriteria'])->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembobotan  $pembobotan
     * @return \Illuminate\Http\Response
     */
    public function show(Pembobotan $pembobotan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembobotan  $pembobotan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembobotan $pembobotan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembobotan  $pembobotan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembobotan $pembobotan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembobotan  $pembobotan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembobotan $pembobotan)
    {
        //
    }

    

    public function cekkriteria(Request $request)
    {        
        $namaArray = $request->input('data');
        Session::put('dataKriteria', $namaArray);
        
        // hitung jumlah eigen tiap baris
        $v = json_decode($namaArray);
        $jumlah = SiteHelpers::CreateBlankArray($v);
        
        foreach ($v as $data) {
            for ($i = 0; $i < count($data); $i++) {
                $jumlah[$i] += $data[$i];
            }
        }

        Session::put('jumlahKriteria', $jumlah);


        // Session::has('dataKriteria')
        if (Session::all()) {
            return response()->json(['success' => 'Session berhasil']);
        } else {
            return response()->json(['arror' => 'Session gagal']);
        }        
    }


    public function ceksubkriteria(Request $request)
    {    
        // Session::forget('dataSubKriteria');
        $namaArray = $request->input('data');
        $namaKriteria = $request->namakriteria;

        $data = [
            'namakriteria' => $namaKriteria,
            'dataperbandingan' => $namaArray,
        ];

        Session::put($namaKriteria, $namaArray);

         // hitung jumlah eigen tiap baris
        $v = json_decode($namaArray);
        $jumlah = SiteHelpers::CreateBlankArray($v);
        
        foreach ($v as $data) {
            for ($i = 0; $i < count($data); $i++) {
                $jumlah[$i] += $data[$i];
            }
        }

        Session::put('jumlahSubKriteria_'.$namaKriteria, $jumlah);


        // Session::has('dataKriteria')
        if (Session::all()) {
            return response()->json(['success' => 'Session berhasil']);
        } else {
            return response()->json(['arror' => 'Session gagal']);
        } 
        // return  $namaArray;  





        // if (Session::has('dataSubKriteria')) {

        //     $sessionData = session('dataSubKriteria');
        //     $dataSama = [];
        //     foreach($sessionData as $data){
        //         if ($data['namakriteria'] == $namaKriteria) {
        //             $dataSama = $sessionData;
        //         }
        //     }

        //     if (count($dataSama) == 1) {
        //         foreach ($sessionData as $key => $kategori) {
        //             if ($kategori['namakriteria'] == $namaKriteria) {
        //                 $sessionData[$key]['dataperbandingan'] = $namaArray;
        //              }
        //         }
        //         Session::forget('dataSubKriteria');
        //         Session::put('dataSubKriteria', $sessionData);
        //     }else{
        //         Session::push('dataSubKriteria', $data);
        //     }
        // }else{
        //     Session::push('dataSubKriteria', $data);
        // }
             
    }


}
