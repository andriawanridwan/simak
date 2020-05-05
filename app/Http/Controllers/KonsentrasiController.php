<?php

namespace App\Http\Controllers;
use App\konsentrasi;
use App\prodi;
use Illuminate\Http\Request;

class KonsentrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $konsentrasi = konsentrasi::all();
        return view('konsentrasi.index_konsentrasi',compact('konsentrasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prodi = Prodi::all();
        return view('konsentrasi.create_konsentrasi',compact('prodi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         konsentrasi::create($request->all());
         return redirect(route('konsentrasi.index'))->with('pesan','Berhasil Disimpan');
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
        $prodi = Prodi::all();
        $konsentrasi = konsentrasi::findOrFail($id);
        return view('konsentrasi.edit_konsentrasi',compact('konsentrasi','prodi'));
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
        $konsentrasi = konsentrasi::findOrFail($id);
        $konsentrasi->update($request->all());
         return redirect(route('konsentrasi.index'))->with('pesan','Berhasil DiUpdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       konsentrasi::destroy($id);
        return redirect(route('konsentrasi.index'))->with('pesan','Berhasil DiHapus');
    }
}
