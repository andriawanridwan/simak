@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Tambah Prodi</h1>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('pengguna.update',$user->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" value="{{$user->username}}" class="form-control" value="" required>
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" value="{{$user->email}}" class="form-control" value="" required>
                    </div>

                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" placeholder="Kosongkan Jika tidak diubah" class="form-control" >
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>

                </form>
            </div>
        </div>    
    </div>
</div>

@endsection
