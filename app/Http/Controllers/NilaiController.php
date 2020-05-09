<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Konsentrasi;
use App\Prodi;
use Auth;
use App\Dosen;
use App\TahunAkademik;
use Illuminate\Support\Facades\Input;
use App\Registrasi;
use App\Jadwal;
use App\Krs;
use App\Khs;
use App\Matkul;
class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $akademik = TahunAkademik::where('status','aktif')->first();
        $dosen = Dosen::where('nip',Auth::user()->username)->first();
        $matkul = Jadwal::where(['dosen_id' => Auth::user()->username,'tahun_akademik_id' => $akademik->id])->get();
        if(Input::get('matkul')){
           $jadwal = Jadwal::where('matkul_id',Input::get('matkul'))->first();
           $mahasiswa = Krs::where('jadwal_id',$jadwal->id)->get();
           $fmatkul = Matkul::where('kode_matkul',Input::get('matkul'))->first();
           $khs = [];
           foreach($mahasiswa as $m){
               $k = Khs::where(['nim' => $m->nim])->whereHas('krs.jadwal', function($q){
                   $q->where('matkul_id',Input::get('matkul'));
               })->with('mahasiswa')->first();
               array_push($khs,$k);
           }
            return view('nilai.index_nilai',compact('akademik','matkul','dosen','khs','fmatkul'));
        }
        return view('nilai.index_nilai',compact('akademik','matkul','dosen'));
    }

    public function nilaikehadiran($id,$nilai){
        $krs = Krs::where('nim',$id)->first();
        Khs::where(['nim' => $id, 'krs_id' => $krs->id])->update(['kehadiran' => $nilai]);
    }

    public function nilaitugas($id,$nilai){
         $krs = Krs::where('nim',$id)->first();
         Khs::where(['nim' => $id, 'krs_id' => $krs->id])->update(['tugas' => $nilai]);
    }

    public function nilaimutu($id,$nilai){
         $krs = Krs::where('nim',$id)->first();
         Khs::where(['nim' => $id, 'krs_id' => $krs->id])->update(['mutu' => $nilai]);
    }

    public function nilaigrade($id,$nilai){
         $krs = Krs::where('nim',$id)->first();
         Khs::where(['nim' => $id, 'krs_id' => $krs->id])->update(['grade' => $nilai]);
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
