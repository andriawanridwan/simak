@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Krs Mahasiswa</h1>
</div>
 @if(session('pesan'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('pesan') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
<div class="card">
    <div class="card-body">
        <a href="{{route('tambahkrs',$mahasiswa->nim)}}" class="btn btn-primary">+ Tambah Krs</a>
        <a href="{{route('cetakkrs',$mahasiswa->nim)}}" class="btn btn-success"><i class="fas fa-print"></i> Cetak Krs</a>
        <br><br>
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
            <tr class="bg-primary text-center text-white">
                <th>NO</th>
                <th>KODE</th>
                <th>NAMA MATAKULIAH</th>
                <th>SKS</th>
                <th>DOSEN</th>
                <th>Hapus</th>
            </tr>
             <?php $i = 0 ?>
            @foreach($krs as $k)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$k->jadwal->matkul_id}}</td>
                    <td>{{$k->jadwal->matkul->matkul}}</td>
                    <td>{{$k->jadwal->matkul->sks}}</td>
                    <td>{{$k->jadwal->dosen->nama}}</td>
                    <td ><a href="{{route('hapuskrsmahasiswa',$k->id)}}" class="btn btn-danger float-center"><i class="fas fa-trash"></i></a></td>
                </tr>
                <?php $i += $k->jadwal->matkul->sks ?>
            @endforeach
            <tr>
                <td colspan="3" class="text-right">Total</td>
                <td colspan="3">{{$i}}</td>
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