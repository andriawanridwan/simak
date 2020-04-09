@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Tambah Prodi</h1>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('prodi.update', $prodi->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="">Prodi</label>
                        <input type="text" name="prodi" value="{{ $prodi->prodi }}" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>

                </form>
            </div>
        </div>    
    </div>
</div>

@endsection
