@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Khs Mahasiswa</h1>
</div>
 
<div class="card">
    <div class="card-body">
        <a href="{{route('cetakkhs', $mahasiswa->nim)}}" class="btn btn-success"><i class="fas fa-print"></i> Cetak Khs</a><br><br>
        <table class="table table-bordered">
            <tr>
                <td width="25%">NAMA</td>
                <td>{{$mahasiswa->mahasiswa->nama}}</td>
                <td width="25%">NIM</td>
                <td>{{$mahasiswa->nim}}</td>
            </tr>
            <tr>
                <td>Prodi, Konsentrasi</td>
                <td>{{$mahasiswa->mahasiswa->prodi->prodi}}, {{$mahasiswa->mahasiswa->konsentrasi->konsentrasi}}</td>
                <td>Semester</td>
                <td>{{substr($mahasiswa->tahun_akademik->tahun_akademik,4)}}</td>
            </tr>
        </table>
        
        <table class="table table-bordered">
            <tr class="text-center text-white bg-primary">
                <th>No</th>
                <th>Kode Matkul</th>
                <th>Nama Matakuliah</th>
                <th>Dosen</th>
                <th>Sks</th>
                <th>Grade</th>
                <th>Mutu</th>
                <th>Sks x Mutu</th>
            </tr>
            <?php $i = 0 ?>
            @foreach($khs as $k)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$k->krs->jadwal->matkul_id}}</td>
                    <td>{{$k->krs->jadwal->matkul->matkul}}</td>
                    <td>{{$k->krs->jadwal->dosen->nama}}</td>
                    <td>{{$k->krs->jadwal->matkul->sks}}</td>
                    <td>{{$k->grade}}</td>
                    <td>{{$k->mutu}}</td>
                    <td>{{$k->krs->jadwal->matkul->sks*$k->mutu}}</td>
                    <?php $i += $k->krs->jadwal->matkul->sks ?>
                </tr>
            @endforeach
            <tr>
                <td colspan="4" class="text-right">Total</td>
                <td>{{$i}}</td>
            </tr>
        </table>
    </div>
</div>

@endsection
@push('myjs')
<script>
$(document).ready(function() {
    $('#example').DataTable();
});
</script>
@endpush