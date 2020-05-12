<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;
class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('pengguna.index_pengguna',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengguna.create_pengguna');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::insert([
            'username' => $request->username,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'level'    => 'Admin',
            'status'   => 1
        ]);
        return redirect(route('pengguna.index'))->with('pesan','Berhasil Simpan');
    }

    public function tidakactive($id){
        $user = User::findOrFail($id);
        $user->update(['status' => 0]);
        return redirect(route('pengguna.index'))->with('pesan','Berhasil diUpdate');
    }

    public function active($id){
        $user = User::findOrFail($id);
        $user->update([ 'status' => 1 ]);
        return redirect(route('pengguna.index'))->with('pesan','Berhasil diUpdate');
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
        $user = User::findOrFail($id);
        return view('pengguna.edit_pengguna',compact('user'));
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
        if($request->password == null){
            User::findOrFail($id)->update([
                'username' => $request->username,
                'email' => $request->email
            ]);
        }else{
             User::findOrFail($id)->update([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
        }
        return redirect(route('pengguna.index'))->with('pesan','Berhasil diUpdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
