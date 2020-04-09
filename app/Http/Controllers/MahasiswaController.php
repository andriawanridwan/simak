<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prodi;
use App\Konsentrasi;
use App\Mahasiswa;
use App\TahunAngkatan;
use Illuminate\Support\Facades\Input;
class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $so_prodi = Prodi::all();
        
        $so_tahun_angkatan = TahunAngkatan::all();

        $prodi = Input::get('prodi');
        $konsentrasi = Input::get('konsentrasi');
        $so_konsentrasi = Konsentrasi::where('prodi_id',$prodi)->get();
        $tahun_angkatan = Input::get('tahun_angkatan');
        if(isset( $prodi )){

            $mahasiswa =  Mahasiswa::where([
                'prodi_id'          => $prodi,
                'konsentrasi_id'    => $konsentrasi,
                'tahun_angkatan_id' => $tahun_angkatan,
            ])->get();
             return view('mahasiswa.index_mahasiswa',compact('so_prodi','so_konsentrasi','so_tahun_angkatan','mahasiswa'));
        }
        
        return view('mahasiswa.index_mahasiswa',compact('so_prodi','so_konsentrasi','so_tahun_angkatan'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prodi = Prodi::all();
        $konsentrasi = Konsentrasi::all();
        $tahun_angkatan = TahunAngkatan::all();
        return view('mahasiswa.create_mahasiswa',compact('prodi','konsentrasi','tahun_angkatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Mahasiswa::create($request->all());
        return redirect(route('mahasiswa.index'))->with('pesan','Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mahasiswa =  Mahasiswa::findOrFail($id);
        return view('mahasiswa.detail_mahasiswa',compact('mahasiswa'));
    }

    public function cekkonsentrasi(Request $request){
        return Konsentrasi::where('prodi_id',$request->id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $prodi = Prodi::all();
        $konsentrasi = Konsentrasi::all();
        $tahun_angkatan = TahunAngkatan::all();
        return view('mahasiswa.edit_mahasiswa',compact('prodi','konsentrasi','tahun_angkatan','mahasiswa'));
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
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update($request->all());
        return redirect(route('mahasiswa.index'))->with('pesan','Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mahasiswa::findOrFail($id);
        return redirect(route('mahasiswa.index'))->with('pesan','Berhasil diHapus');
    }
}
