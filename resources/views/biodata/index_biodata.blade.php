@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Biodata</h1>
</div>
<div class="alert alert-primary"><i class="fas fa-info"></i> &nbsp; Jika ada kesalahan data harap lapor admin</div>
<div class="card">
    <div class="card-body">
        @if(Auth::user()->level == 'Dosen')
       <table class="table  table-striped">
        <tr>
            <td>Nip</td>
            <td style="max-width:5px;" class="text-center">:</td>
            <td>{{$biodata->nip}}</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td style="max-width:5px;" class="text-center">:</td>
            <td>{{$biodata->nama}}</td>
        </tr>
        <tr>
            <td>No Telepon</td>
            <td style="max-width:5px;" class="text-center">:</td>
            <td>{{$biodata->no_telp}}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td style="max-width:5px;" class="text-center">:</td>
            <td>{{$biodata->email}}</td>
        </tr>
        <tr>
            <td>Prodi</td>
            <td style="max-width:5px;" class="text-center">:</td>
            <td>{{$biodata->prodi->prodi}}</td>
        </tr>
       </table>
        @else
       
       <table class="table table-bordered">
        <tr>
            <td>NIM</td>
            <td style="max-width:5px;" class="text-center">:</td>
            <td>{{$biodata->nim}}</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td style="max-width:5px;" class="text-center">:</td>
            <td>{{$biodata->nama}}</td>
        </tr>
        <tr>
            <td>Angkatan</td>
            <td style="max-width:5px;" class="text-center">:</td>
            <td>{{$biodata->tahun_angkatan->tahun_angkatan}}</td>
        </tr>
        <tr>
            <td>Semester</td>
            <td style="max-width:5px;" class="text-center">:</td>
            <td>{{substr( $semester->tahun_akademik->tahun_akademik,4) }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td style="max-width:5px;" class="text-center">:</td>
            <td>{{$biodata->jk}}</td>
        </tr>
        <tr>
            <td>Agama</td>
            <td style="max-width:5px;" class="text-center">:</td>
            <td>{{$biodata->agama}}</td>
        </tr>
        <tr>
            <td>Tempat Lahir</td>
            <td style="max-width:5px;" class="text-center">:</td>
            <td>{{$biodata->tempat_lahir}}</td>
        </tr>
        
        <tr>
            <td>Tanggal Lahir</td>
            <td style="max-width:5px;" class="text-center">:</td>
            <td>{{$biodata->tanggal_lahir}}</td>
        </tr>
       </table>
       @endif
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