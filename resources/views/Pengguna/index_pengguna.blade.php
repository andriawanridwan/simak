@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Pengguna</h1>
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
        <a href="{{ route('pengguna.create') }}" class="btn btn-primary mb-4">+ Tambah Data</a>
        <table id="example" class="table table-stripped table-bordered">
            <thead>
                <tr>
                    <th style="max-width:20px;">No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Level</th>
                    <th>Status</th>
                    <th >Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($user as $u)
               <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$u->username}}</td>
                <td>{{$u->email}}</td>
                <td>{{$u->password}}</td>
                <td>{{$u->level}}</td>
                <td>{{ $u->status == 1 ? 'Active' : 'Tidak Active' }}</td>
                <td>
                     <div class="btn-group">
                        <a href="{{ route('pengguna.edit', $u->id) }}" class="btn btn-success"><i class="fas fa-pencil-alt"></i></a>
                        </div>
                        <div class="btn-group">
                            @if($u->status == 1)
                                <a href="{{ route('pengguna.tidakactive', $u->id) }}" class="btn btn-danger">NonActive</a>
                            @else
                                <a href="{{ route('pengguna.active', $u->id) }}" class="btn btn-primary">Active</a>
                            @endif
                        </div>
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