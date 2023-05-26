<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Subkriteria;
use Illuminate\Http\Request;

class KriteriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kriteria.kriteria', [
            "title" => "Data Kriteria",
            "kriterias" => Kriteria::all(),
            "subkriterias" => Subkriteria::with(['kriteria'])->latest()->get(),
        ]);

        // // $su = Subkriteria::with(['kriteria'])->get();
        // $su = Kriteria::all();
        // foreach(Kriteria::all() as $s){
        //     dd($s);
        // }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kriteria.formkriteria',[
            'title' => 'Form Kriteria'
        ]);
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
            'nama_kriteria' => 'required|unique:kriterias|max:255',
            'bobot_kriteria' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
        ]);

        Kriteria::create($validatedData);
        return redirect('/kriteria')->with('success','Data Berhasil di input!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function show(Kriteria $kriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('kriteria.editkriteria', [
            'title' => 'Form Edit Data Kriteria',
            "kriteria" => Kriteria::where('id', $id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Kriteria $kriteria)
    {
        $rule = [
            'bobot_kriteria' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
        ];
    
        if($request->nama_kriteria != $kriteria->nama_kriteria) {
            $rule['nama_kriteria'] = 'required|unique:kriterias|max:255';
        }
        
        $validatedData = $request->validate($rule);

        Kriteria::where('id', $id)->update($validatedData);
        return redirect('/kriteria')->with('success','Data Berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kriteria::destroy($id);
        return redirect('/kriteria')->with('success','Data Berhasil di hapus!');
    }
}
