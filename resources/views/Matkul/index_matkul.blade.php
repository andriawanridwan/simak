@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Mata Kuliah</h1>
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
        <a href="{{ route('matkul.create') }}" class="btn btn-primary mb-4">+ Tambah Data</a>
        <table id="example" class="table table-stripped table-bordered">
              <thead>
                <tr>
                    <th style="max-width:10px;">No</th>
                    <th>Kode</th>
                    <th>Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Semester</th>
                    <th style="max-width:100px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($matkul as $mapel)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$mapel->kode_matkul}}</td>
                    <td>{{$mapel->matkul}}</td>
                    <td>{{$mapel->sks}}</td>
                    <td>Semester{{$mapel->semester}}</td>
                    <td>
                        <div class="btn-group">
                        <a href="{{ route('matkul.edit', $mapel->kode_matkul) }}" class="btn btn-success"><i class="fas fa-pencil-alt"></i></a>
                        </div>
                        <div class="btn-group">
                            <form action="{{route('matkul.destroy',$mapel->kode_matkul)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
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