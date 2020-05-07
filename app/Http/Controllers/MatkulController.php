<?php

namespace App\Http\Controllers;

use App\Matkul;
use Illuminate\Http\Request;
use App\Prodi;
use App\Konsentrasi;
class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $matkul = Matkul::all();
        return view('matkul.index_matkul',compact('matkul'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $max = Matkul::max('kode_matkul');
        $prodi = Prodi::all();
        $check_max = Matkul::select('Matkul.kode_matkul')->count();
        if($check_max == null){
            $max_code = "DTIKB001";
        }else{
           
            $angka1 = (int)substr($max,5);
            $hsl    = $angka1 +1;
            $fhsl   = sprintf("%03s",$hsl);
            $max_code = 'DTIKB'. $fhsl;
            
        
        }
        return view('matkul.create_matkul',compact('max_code','prodi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $akademik = \App\TahunAkademik::where('status','aktif')->first();
        \App\Jadwal::insert([
            'tahun_akademik_id' => $akademik->id,
            'matkul_id' => $request->kode_matkul,
            'prodi_id'  => $request->prodi_id,
            'konsentrasi_id' => $request->konsentrasi_id
        ]);
        Matkul::create($request->all());

        return redirect(route('matkul.index'))->with('pesan','Berhasil Disimpan');
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
        $matkul = Matkul::findOrFail($id);
        $prodi = Prodi::all();
        $konsentrasi = Konsentrasi::where('prodi_id',$matkul->prodi_id)->get();
        return view('matkul.edit_matkul',compact('matkul','prodi','konsentrasi'));
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
        $matkul = Matkul::findOrFail($id);
        $matkul->update($request->all());
         return redirect(route('matkul.index'))->with('pesan','Berhasil DiUpdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Matkul::destroy($id);
        return redirect(route('matkul.index'))->with('pesan','Berhasil Dihapus');
    }
}
