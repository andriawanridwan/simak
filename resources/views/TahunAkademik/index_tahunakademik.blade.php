@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Tahun Akademik</h1>
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
        <a href="{{ route('tahunakademik.create') }}" class="btn btn-primary mb-4">+ Tambah Data</a>
        <table id="example" class="table table-stripped table-bordered">
            <thead>
                <tr align="center">  
                    <th>Tahun Akademik</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach($data_tahun_akademik as $tahun_akademik)
                <tr align="center">
                    <td>{{$tahun_akademik->tahun_akademik}}</td>
                    <td>{{$tahun_akademik->keterangan}}</td>
                    <td>{{$tahun_akademik->status}}</td>
                    <td>
                        <a href="/tahunakademik/{{$tahun_akademik->id}}/edit" class="btn btn-warning">Edit</a>
                        <a href="/tahunakademik/{{$tahun_akademik->id}}/delete" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
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