@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Tambah Tahun Angkatan</h1>
</div>
<div class="card">
    <div class="card-body">
        <form action="{{ route('tahunangkatan.store') }}" method="post">
            @csrf
            <div class="form-group">
            	<label for="">Tahun Angkatan</label>
                <input type="text" name="tahun_angkatan" class="form-control">
            </div>

			<button type="submit" class="btn btn-primary">Simpan</button>      


        </form>
    </div>
</div>
@endsection
