<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use App\Models\Kriteria;
use App\Models\Subkriteria;
use App\Models\Alternatif;

use Illuminate\Http\Request;

class PenilaiansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('penilaian.penilaian', [
            "title" => "Data Penilaian",
            "kriteria" => Kriteria::all(),
            "alternatifs" => Alternatif::all(),
            // "penilaians" => Penilaian::all(),
            "penilaians" => Penilaian::with(['alternatif','kriteria','subkriteria'])->get(),       
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
        $count = $request->countdata;
        for($i=0;$i<$count;$i++){
            $nilai = new Penilaian;
            $nilai->alternatif_id = isset($request->alternatif_id) ? $request->alternatif_id : '';
            $nilai->kriteria_id = isset($request['kriteria'.$i]) ? $request['kriteria'.$i] : '';
            $nilai->subkriteria_id = isset($request['subkriteria'.$i]) ? $request['subkriteria'.$i] : '';
            $nilai->save();
        }
        return redirect('/penilaian')->with('success','Data Berhasil di input!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function show(Penilaian $penilaian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penilaian = Penilaian::with(['alternatif','kriteria','subkriteria'])->where('alternatif_id', $id)->get();
            // if(!count($penilaian) == 0){
            //     echo 'ok';
            // }else{
            //     echo 'hm';
            // }
        if(!count($penilaian) == 0){
            return view('penilaian.editpenilaian',[
                'title' => 'Form Penilaian',
                'kriterias' => Kriteria::with('subkriteria')->get(),
                // 'alternatif' => Alternatif::where('id', $id)->first(),
                "penilaians" => $penilaian,
             ]);
        }else{
            return redirect('/penilaian');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $count = $request->countdata;
        for($i=0;$i<$count;$i++){
            Penilaian::where('id', $request['penilaian'.$i])->update([
                'alternatif_id' => $request->alternatif_id,
                'subkriteria_id' => $request['kriteria'.$i],
                'subkriteria_id' => $request['subkriteria'.$i]
            ]);   
        }
        return redirect('/penilaian')->with('success1','Data Berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kk = Penilaian::where('alternatif_id', $id)->get();
        foreach($kk as $k){
            Penilaian::destroy($k->id);   
        }
        return redirect('/penilaian')->with('success1','Data Berhasil di hapus!');
    }

    public function nilai(Request $request)
    {
        $penilaian = Penilaian::where('alternatif_id', $request->id)->first();
        if(empty($penilaian)){
            return view('penilaian.formpenilaian',[
                'title' => 'Form Penilaian',
                'kriterias' => Kriteria::with('subkriteria')->get(),
                'alternatif' => Alternatif::where('id', $request->id)->first(),
             ]);
        }else{
            return redirect('/penilaian');
        }
    }
}
