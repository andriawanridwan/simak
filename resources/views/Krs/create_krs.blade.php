@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Krs Mahasiswa</h1>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">     
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Prodi</label>
                    <input type="text" value="{{$mahasiswa->prodi->prodi}}" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="">Konsentrasi</label>
                    <input type="text" value="{{$mahasiswa->konsentrasi->konsentrasi}}" class="form-control" readonly>
                </div>
              
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" value="{{$mahasiswa->nama}}" class="form-control" readonly>
                </div>
            </div>
            <div class="col-md-9">
                <table class="table table-bordered">
                    <tr>
                        <td colspan="6">Daftar Mata kuliah</td>
                        <td><a href="{{ route('krs.index') }}" class="btn btn-success">Kembali</a></td>
                    </tr>
                    <tr>
                        <td>No</td>
                        <td>Semester</td>
                        <td>Kode</td>
                        <td>Nama Matakuliah</td>
                        <td>Sks</td>
                        <td>Dosen</td>
                        <td>Ambil</td>
                    </tr>
                    @foreach($jadwal as $k)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$k->matkul->semester}}</td>
                            <td>{{$k->matkul->kode_matkul}}</td>
                            <td>{{$k->matkul->matkul}}</td>
                            <td>{{$k->matkul->sks}}</td>
                            <td>{{$k->dosen->nama}}</td>

                                @foreach($krs as $p)
                                    @if($p->jadwal_id != $k->id)
                                            <td><a href="{{route('ambilkrs',[$mahasiswa->nim,$k->id])}}" class="btn btn-primary">Ambil</a></td>
                                    
                                    @endif
                                @endforeach
                            
                        
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection