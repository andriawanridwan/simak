<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prodi;
use App\Registrasi;
use App\Jadwal;
use App\Mahasiswa;
use App\Krs;
class KrsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prodi = Prodi::all();
        $mahasiswa = Registrasi::all();
        return view('krs.index_krs',compact('prodi','mahasiswa'));
    }

    public function cari(Request $request){
        $mahasiswa = Mahasiswa::where([
            'prodi_id'          => $request->prodi,
            'konsentrasi_id'    => $request->konsentrasi
        ])->get();
        $registrasi = Registrasi::all();
        $arr = [];
        // if(count($registrasi) > 0){
        //      foreach($mahasiswa as $ma){
        //         foreach($registrasi as $re){
        //             if($registrasi->nim == $)
        //         }
        //     }
        // }
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

    public function carinama(Request $request){
        $arr = [];
        $jadwal = Krs::where('nim',$request->nim)->with('mahasiswa','jadwal','jadwal.matkul','jadwal.dosen')->get();
        array_push($arr,$jadwal);
        $registrasi =  Registrasi::where('nim', $request->nim)->with('mahasiswa','tahun_akademik')->first();
        array_push($arr,$registrasi);
        return $arr;
        
    }

    public function hapus($id){
        Krs::where('jadwal_id',$id)->delete();
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
        $mahasiswa = Mahasiswa::findOrFail($id);
        $jadwal = Jadwal::all();
        // $krs = Krs::where('nim', $id)->get();
        // $arr = [];
        // $arr2 = [];
        // foreach($jadwal as $ja){
        //     foreach($krs as $k){
        //         if($ja->id != $k->jadwal_id){
        //             $arr = Jadwal::where('id',$ja->id)->with('matkul')->first();
        //             $arr['dosen'] = $ja->dosen->nama;
        //             $arr['jadwal_id']   = $ja->id;
        //         }
        //     }
        //     array_push($arr2,$arr);
        // }
        // return $arr2;
        $krs = Krs::all();
        return view('krs.create_krs',compact('mahasiswa','jadwal','krs') );
    }

    public function ambilkrs($nim,$jadwal_id){
        $krs = Krs::where(['nim' => $nim, 'jadwal_id' => $jadwal_id])->first();
        if($krs == null){
            Krs::insert([
            'nim' => $nim,
            'jadwal_id' => $jadwal_id
        ]);
        }
        
        return redirect(route('krs.show',$nim));
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
