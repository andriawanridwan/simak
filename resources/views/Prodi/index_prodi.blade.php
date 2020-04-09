@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Prodi</h1>
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
        <a href="{{ route('prodi.create') }}" class="btn btn-primary mb-4">+ Tambah Data</a>
        <table id="example" class="table table-stripped table-bordered">
            <thead>
                <tr>
                    <th style="max-width:10px;">No</th>
                    <th>Prodi</th>
                    <th style="max-width:40px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($prodi as $p)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$p->prodi}}</td>
                    <td>
                        <div class="btn-group">
                        <a href="{{ route('prodi.edit', $p->id) }}" class="btn btn-success"><i class="fas fa-pencil-alt"></i></a>
                        </div>
                        <div class="btn-group">
                            <form action="{{route('prodi.destroy',$p->id)}}" method="post">
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