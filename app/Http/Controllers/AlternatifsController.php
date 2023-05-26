<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;

class AlternatifsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('alternatif.alternatif', [
            "title" => "Data Alternatif",
            "alternatifs" => Alternatif::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alternatif.formalternatif',[
            'title' => 'Form Alternatif'
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
            'nik' => 'required|unique:alternatifs',
            'nama' => 'required|max:255',
            'alamat' => 'nullable',
        ]);

        Alternatif::create($validatedData);
        return redirect('/alternatif')->with('success','Data Berhasil di input!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function show(Alternatif $alternatif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('alternatif.editalternatif', [
            'title' => 'Form Edit Data Alternatif',
            "alternatif" => Alternatif::where('id', $id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alternatif $alternatif)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'alamat' => 'nullable',
        ]);

        if($request->nik != $alternatif->nik) {
            $validatedData['nik'] = 'required|unique:alternatifs|max:255';
        }

        Alternatif::where('id', $alternatif->id)->update($validatedData);
        return redirect('/alternatif')->with('success','Data Berhasil di input!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Alternatif::destroy($id);
        return redirect('/alternatif')->with('success','Data Berhasil di hapus!');
    }
}
