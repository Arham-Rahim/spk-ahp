<?php

namespace App\Http\Controllers;

use App\Models\Subkriteria;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class SubkriteriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validatedData = $request->validate([
            'kriteria_id' => 'required|max:255',
            'nama_sub_kriteria' => 'required|max:255',
        ]);

        Subkriteria::create($validatedData);
        return redirect('/kriteria')->with('success'.$request->kriteria_id,'Data Berhasil di input!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    public function show(Subkriteria $subkriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('kriteria.editsubkriteria', [
            'title' => 'Form Edit Data Sub Kriteria',
            "subkriteria" => Subkriteria::with(['kriteria'])->where('id', $id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Subkriteria $subkriteria)
    {
        $validatedData = $request->validate([
            'nama_sub_kriteria' => 'required|max:255',
        ]);

        Subkriteria::where('id', $id)->update($validatedData);
        return redirect('/kriteria')->with('success'.$request->kriteria_id,'Data Berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kk = Subkriteria::with(['kriteria'])->where('id', $id)->get();
        foreach($kk as $k){
            if(!empty($k)){
                Subkriteria::destroy($id);
                return redirect('/kriteria')->with('success'.$k->kriteria_id,'Data Berhasil di hapus!');
            }else{
                return redirect('/kriteria')->with('success'.$k->kriteria_id,'Data Gagal di hapus!');
            }
        }
        
        // foreach($kriteria as $k){
        //     return redirect('/kriteria')->with('success'.$k->kriteria_id,'Data Berhasil di hapus!');
        // }
       
    }

    public function add_subkriteria(Request $request)
    {
        $kriteria = Kriteria::where('id', $request->id)->first();
        if($kriteria){
            return view('kriteria.formsubkriteria',[
                'title' => 'Form Sub Kriteria',
                'kriteria' => Kriteria::where('id', $request->id)->first(),
            ]);
        }else{

            // Harusnya di redireg
            return view('kriteria.kriteria', [
                "title" => "Data Kriteria",
                "kriterias" => Kriteria::all(),
            ]);
        }

    }
}
