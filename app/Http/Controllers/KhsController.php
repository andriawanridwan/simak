<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Khs;
use App\Prodi;
use App\TahunAngkatan;
use App\Mahasiswa;
use App\Registrasi;
use Illuminate\Support\Facades\Input;
class KhsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prodi = Prodi::all();
        $tahun_angkatan = TahunAngkatan::all();
        $nim = Input::get('nim');
        if($nim){
            $mahasiswa = Registrasi::where('nim',$nim)->with('mahasiswa','tahun_akademik')->first();
            $khs       = Khs::where('nim',$nim)->with('krs','krs.jadwal','krs.jadwal.matkul','krs.jadwal.dosen')->get();
         
            return view('khs.index_khs',compact('prodi','tahun_angkatan','mahasiswa','khs'));
        }
        return view('khs.index_khs',compact('prodi','tahun_angkatan'));
    }

    public function cari(Request $request){
        $mahasiswa = Mahasiswa::where([
            'prodi_id'          => $request->prodi,
            'tahun_angkatan_id' => $request->tahun_angkatan,
            'konsentrasi_id'    => $request->konsentrasi
        ])->get();
        $registrasi = Registrasi::all();
        $arr = [];
        
        $arr2 = [];
        foreach($registrasi as $re){
            if($re->mahasiswa->prodi_id == $request->prodi && $re->mahasiswa->konsentrasi_id == $request->konsentrasi){
                $arr2['nim'] = $re->nim;
                $arr2['nama'] = $re->mahasiswa->nama;
                array_push($arr,$arr2);
            }
        }
       
        return $arr;
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
        //
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
        //
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
        //
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
