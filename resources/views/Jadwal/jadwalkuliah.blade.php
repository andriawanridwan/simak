@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Jadwal Kuliah</h1>
</div>

<div class="card">
    <div class="card-body">
       <table class="table table-bordered">
        <tr>
            <td class="bg-primary text-white text-center" colspan="8"><strong>Jadwal Kuliah</strong></td>
        </tr>
        <tr>
            <td>Tahun Akademik</td>
            <td colspan="7">{{$akademik->tahun_akademik}}</td>
        </tr>
        <tr>
            <td>Keterangan</td>
            <td colspan="7">{{$akademik->keterangan}}</td>
        </tr>
        <tr>
            <td class="text-center bg-primary text-white">No</td>
            <td class="text-center bg-primary text-white">Hari</td>
            <td class="text-center bg-primary text-white">Kode</td>
            <td class="text-center bg-primary text-white">Matakuliah</td>
            <td class="text-center bg-primary text-white">SKS</td>
            <td class="text-center bg-primary text-white">Ruang</td>
            <td class="text-center bg-primary text-white">Jam</td>
            <td class="text-center bg-primary text-white">Dosen</td>
        </tr>
        @foreach($jadwal as $j)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$j->jadwal->hari}}</td>
                <td>{{$j->jadwal->matkul_id}}</td>
                <td>{{$j->jadwal->matkul->matkul}}</td>
                <td>{{$j->jadwal->matkul->sks}}</td>
                <td>{{$j->jadwal->ruangan_id == null || $j->jadwal->ruangan_id == '' ? 'Not Set' : $j->jadwal->ruangan->ruangan  }}</td>
                <td>{{$j->jadwal->jam_mulai}} - {{$j->jadwal->jam_selesai}}</td>
                <td>{{$j->jadwal->dosen->nama}}</td>
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