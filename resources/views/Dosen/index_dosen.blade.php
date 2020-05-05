@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Dosen</h1>
</div>
 @if(session('pesan'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            {{ session('pesan') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
<div class="card">
    <div class="card-body">
        <a href="{{ route('dosen.create') }}" class="btn btn-primary mb-4">+ Tambah Data</a>
        <div class="table-responsive">
        <table id="example" class="table table-stripped table-bordered">
            <thead>
                <tr align="center">
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>No Telpon</th>
                    <th>Email</th>
                    <th>Prodi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach($data_dosen as $dosen)
                <tr align="center">
                    <td>{{$dosen->nip}}</td>
                    <td>{{$dosen->nama}}</td>
                    <td>{{$dosen->no_telp}}</td>
                    <td>{{$dosen->email}}</td>
                    <td>{{$dosen->prodi->prodi}}</td>
                    <td>
                        <a href="/dosen/{{$dosen->nip}}/edit" class="btn btn-warning">Edit</a>
                        <a href="/dosen/{{$dosen->nip}}/delete" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div> 
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