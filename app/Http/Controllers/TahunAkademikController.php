<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TahunAkademikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data_tahun_akademik = \App\TahunAkademik::all();
        return view('TahunAkademik.index_tahunakademik',['data_tahun_akademik' => $data_tahun_akademik]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('TahunAkademik.create_tahunakademik');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \App\TahunAkademik::create($request->all());
        return redirect(route('tahunakademik.index'))->with('pesan','Berhasil Disimpan');;
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
        $tahun_akademik = \App\TahunAkademik::find($id);
        return view('TahunAkademik.edit_tahunakademik',['tahun_akademik' => $tahun_akademik]);
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
        $tahun_akademik = \App\TahunAkademik::find($id);
        $tahun_akademik->update($request->all());
        return redirect(route('tahunakademik.index'))->with('pesan','Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tahun_akademik = \App\TahunAkademik::find($id);
        $tahun_akademik->delete($tahun_akademik);
        return redirect(route('tahunakademik.index'))->with('pesan','Berhasil Dihapus');
    }
}
