@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Tambah Prodi</h1>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('prodi.store') }}" method="post">
                    @csrf
                    
                    <div class="form-group">
                        <label for="">Prodi</label>
                        <input type="text" name="prodi" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>

                </form>
            </div>
        </div>    
    </div>
</div>

@endsection
