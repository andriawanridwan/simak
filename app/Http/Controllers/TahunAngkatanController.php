<?php

namespace App\Http\Controllers;

use App\TahunAngkatan;
use Illuminate\Http\Request;

class TahunAngkatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahunangkatan = TahunAngkatan::all();    
        return view('TahunAngkatan.index_tahunangkatan',compact('tahunangkatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tahunangkatan.create_tahunangkatan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TahunAngkatan::create($request->all());
        return redirect(route('tahunangkatan.index'))->with('pesan','Berhasil Disimpan');
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
        $tahunangkatan = TahunAngkatan::findOrFail($id);
        return view('TahunAngkatan.edit_tahunangkatan',compact('tahunangkatan'));
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
        $tahunangkatan = TahunAngkatan::findOrFail($id);
        $tahunangkatan->update($request->all());
         return redirect(route('tahunangkatan.index'))->with('pesan','Berhasil DiUpdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tahunangkatan::destroy($id);
        return redirect(route('tahunangkatan.index'))->with('pesan','Berhasil DiHapus');
    }
}
