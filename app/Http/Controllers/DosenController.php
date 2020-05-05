<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Prodi;
use App\User;
class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_dosen = \App\Dosen::all();
        return view('Dosen.index_dosen',['data_dosen' => $data_dosen]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_prodi = Prodi::all();
        return view('Dosen.create_dosen',compact('data_prodi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \App\Dosen::create($request->all());
         User::create([
            'username' => $request->nip,
            'email' => $request->email,
            'password' => Hash::make($request->nip),
            'level' => 'Dosen',
            'status'    => 1
        ]);
        return redirect(route('dosen.index'))->with('pesan','Berhasil Disimpan');;
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
        $dosen = \App\Dosen::find($id);
        $data_prodi = Prodi::all();
        return view('Dosen.edit_dosen',compact('dosen','data_prodi'));
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
        $dosen = \App\Dosen::find($id);
        $dosen->update($request->all());
        return redirect(route('dosen.index'))->with('pesan','Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dosen = \App\Dosen::find($id);
        $dosen->delete($dosen);
        return redirect(route('dosen.index'))->with('pesan','Berhasil Dihapus');
    }
}
