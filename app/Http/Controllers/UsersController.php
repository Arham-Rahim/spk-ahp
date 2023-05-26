<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.user', [
            "title" => "Data User",
            "users" => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.formuser',[
            'title' => 'Form User'
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
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255|email',
            'password' => 'min:3|max:255|confirmed',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        return redirect('/user')->with('success','Data Berhasil di input!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('user.edituser', [
            'title' => 'Form Edit Data User',
            "user" => User::where('id', $id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'old_password' => 'required|max:255|min:3',
            'password' => 'required|min:3|max:255|confirmed',
        ]);

        $currentPassword = auth()->user()->password;
        $old_password = $request->old_password;
        
        if (Hash::check($old_password, $currentPassword)){
            auth()->user()->update(['password' => bcrypt($request->password)]);
            return redirect('/user')->with('success','Password Berhasil Diubah!');
        }else{
            return back()->withErrors(['old_password' => 'Pastikan masukan password lama dengan benar']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/user')->with('success','Data Berhasil di hapus!');
    }
}
