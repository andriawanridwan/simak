@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Jadwal Mengajar</h1>
</div>
 
<div class="card">
    <div class="card-body">
       <table class="table table-bordered">
        <tr>
            <td width="25%">Nama Dosen</t>
            <td class="text-center">{{$dosen->nama}}</td>
        </tr>
        <tr>
            <td width="25%">Tahun Akademik</td>
            <td class="text-center">{{$akademik->tahun_akademik}}</td>
        </tr>
       </table>
       <br>
       <table class="table table-bordered">
       <tr>
        <td colspan="8" class="text-center bg-primary text-white">Jadwal Mengajar</td>
       </tr>
       <tr class="text-center bg-primary text-white">
        <td>No</td>
        <td>Jurusan</td>
        <td>Kode</td>
        <td>Matakuliah</td>
        <td>Hari</td>
        <td>Ruangan</td>
        <td>Jam</td>
        <td>Sks</td>
       </tr>
       @foreach($jadwal as $j)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>S{{$j->matkul->semester}} - {{$j->konsentrasi->konsentrasi}}</td>
                <td>{{$j->matkul->kode_matkul}}</td>
                <td>{{$j->matkul->matkul}}</td>
                <td>{{$j->hari}}</td>
                <td>{{$j->ruangan_id == null || $j->ruangan_id == '' ? 'Not Set' : $j->ruangan->ruangan  }}</td>
                <td>{{$j->jam_mulai}} - {{$j->jam_selesai}}</td>
                <td>{{$j->matkul->sks}}</td>
            </tr>
       @endforeach
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