<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prodi;
use App\TahunAngkatan;
use App\Mahasiswa;
use App\TahunAkademik;
use App\Jadwal;
use App\Matkul;
use App\Ruangan;
use App\Dosen;
use Auth;
use App\Krs;
class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function lihatjadwal(){
        $akademik = TahunAkademik::where('status','aktif')->first();
        $dosen = Dosen::where('nip',Auth::user()->username)->first();
        $jadwal = Jadwal::all();
        return view('jadwal.lihatjadwal',compact('akademik','dosen','jadwal'));
    }

    public function jadwalkuliah(){
         $akademik = TahunAkademik::where('status','aktif')->first();
         $jadwal = Krs::where('nim',Auth::user()->username)->get();
        return view('jadwal.jadwalkuliah',compact('akademik','jadwal'));
    }
    public function index()
    {
        $prodi = Prodi::all();
        $tahun_angkatan = TahunAngkatan::all();
        $tahun_akademik = TahunAkademik::all();
        return view('jadwal.index_jadwal',compact('prodi','tahun_angkatan','tahun_akademik'));
    }
    
    public function cari(Request $request){
        $jadwal = Jadwal::where([
            'prodi_id' => $request->prodi,
            'konsentrasi_id' => $request->konsentrasi,
        ])->with('matkul')->get();
        $matkul = Matkul::where([
            'prodi_id' => $request->prodi,
            'konsentrasi_id' => $request->konsentrasi,
            'semester'  => $request->semester
        ])->get();
        $ruangan = Ruangan::all();
        $dosen = Dosen::where('prodi_id', $request->prodi)->get();
        $arr = [];
        array_push($arr,$matkul);
        array_push($arr,$ruangan);
        array_push($arr,$dosen);
        array_push($arr,$jadwal);
        return $arr;
        

    }
    public function hariupdate(Request $request){
        $jadwal = Jadwal::where('matkul_id',$request->kode)->first();
        if($jadwal != null){
            Jadwal::where('matkul_id',$request->kode)->update([
                'hari' => $request->hari
            ]);
            return 'update';
        }else{
            Jadwal::insert([
                'tahun_akademik_id' => $request->tahun_akademik,
                'prodi_id'          => $request->prodi,
                'konsentrasi_id'    => $request->konsentrasi,
                'hari'              => $request->hari,
                'matkul_id'         => $request->kode
            ]);
            return 'insert';
        }
    }
    public function ruangupdate(Request $request){
         $jadwal = Jadwal::where('matkul_id',$request->kode)->first();
        if($jadwal != null){
            Jadwal::where('matkul_id',$request->kode)->update([
                'ruangan_id' => $request->ruangan
            ]);
            return 'update';
        }else{
            Jadwal::insert([
                'tahun_akademik_id' => $request->tahun_akademik,
                'prodi_id'          => $request->prodi,
                'konsentrasi_id'    => $request->konsentrasi,
                'ruangan_id'              => $request->ruangan,
                'matkul_id'         => $request->kode
            ]);
            return 'insert';
        }
    }
    public function jamawalupdate(Request $request){
         $jadwal = Jadwal::where('matkul_id',$request->kode)->first();
        if($jadwal != null){
            Jadwal::where('matkul_id',$request->kode)->update([
                'jam_mulai' => $request->jam_awal
            ]);
            return 'update';
        }else{
            Jadwal::insert([
                'tahun_akademik_id' => $request->tahun_akademik,
                'prodi_id'          => $request->prodi,
                'konsentrasi_id'    => $request->konsentrasi,
                'jam_mulai'              => $request->jam_awal,
                'matkul_id'         => $request->kode
            ]);
            return 'insert';
        }
    }
    public function jamakhirupdate(Request $request){
          $jadwal = Jadwal::where('matkul_id',$request->kode)->first();
        if($jadwal != null){
            Jadwal::where('matkul_id',$request->kode)->update([
                'jam_selesai' => $request->jam_akhir
            ]);
            return 'update';
        }else{
            Jadwal::insert([
                'tahun_akademik_id' => $request->tahun_akademik,
                'prodi_id'          => $request->prodi,
                'konsentrasi_id'    => $request->konsentrasi,
                'jam_selesai'         => $request->jam_akhir,
                'matkul_id'         => $request->kode
            ]);
            return 'insert';
        }
        
    }
    public function dosenupdate(Request $request){
         $jadwal = Jadwal::where('matkul_id',$request->kode)->first();
        if($jadwal != null){
            Jadwal::where('matkul_id',$request->kode)->update([
                'dosen_id' => $request->dosen
            ]);
            return 'update';
        }else{
            Jadwal::insert([
                'tahun_akademik_id' => $request->tahun_akademik,
                'prodi_id'          => $request->prodi,
                'konsentrasi_id'    => $request->konsentrasi,
                'dosen_id'         => $request->dosen,
                'matkul_id'         => $request->kode
            ]);
            return 'insert';
        }
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
