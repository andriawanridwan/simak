<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prodi;
use App\TahunAngkatan;
use App\Mahasiswa;
use App\TahunAkademik;
use App\Registrasi;
class RegistrasiController extends Controller
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
        $tahun_akademik = TahunAkademik::all();
        return view('registrasi.index_registrasi',compact('prodi','tahun_angkatan','tahun_akademik'));
    }

    public function cari(Request $request){
         $registrasi = Registrasi::where('tahun_akademik_id',$request->tahun_akademik)->with('mahasiswa','tahun_akademik')->get();
        // return $registrasi;
        
        $mahasiswa = Mahasiswa::where([
                        'prodi_id' => $request->prodi,
                        'konsentrasi_id' => $request->konsentrasi,
                        'tahun_angkatan_id' => $request->tahun_angkatan
                    ])->get();    
        $tahun_akademik = TahunAkademik::findOrFail($request->tahun_akademik);
        $i = 0;
        $arr = [];
        $cek = count($registrasi);
        $fmahas = [];
        foreach($mahasiswa as $ma){
            $arr = $ma;
            if($cek == null){
                $arr['tahun_akd'] = $tahun_akademik->tahun_akademik;
                $arr['status'] = '<span class="badge badge-pill badge-danger">Tidak</span>';
                $arr['tanggal_registrasi'] = '-';   
                $arr['action'] = '<button id="action" class="btn btn-primary ">Registrasi</button>';
            }else{
                foreach($registrasi as $r){
                    if($r->nim == $ma->nim){
                    $arr['tahun_akd'] = $registrasi[$i]->tahun_akademik->tahun_akademik;
                    $arr['status'] = '<span class="badge badge-pill badge-primary">Aktif</span>';
                    $arr['tanggal_registrasi'] = $r->created_at->format('d/m/Y');
                    $arr['action'] = '<button id="action" class="btn btn-danger ">Batal Registrasi</button>';
                    }
                }
                    if(!isset($arr['tahun_akd'])){
                        $arr['tahun_akd'] = $r->tahun_akademik->tahun_akademik;
                        $arr['status'] = '<span class="badge badge-pill badge-danger">Tidak</span>';
                        $arr['tanggal_registrasi'] = '-';   
                        $arr['action'] = '<button id="action" class="btn btn-primary ">Registrasi</button>';    
                    }
                    
            }
            array_push($fmahas,$arr);

        }

        return $fmahas;
        return 'Berhasil';
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
        Registrasi::create($request->all());
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
        
    }
    public function hapus($id){
        Registrasi::where('nim',$id)->delete();
    }
}
