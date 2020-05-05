@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Edit Tahun Angkatan</h1>
</div>
<div class="card">
    <div class="card-body">
        <form action="{{ route('tahunangkatan.update', $tahunangkatan->id) }}" method="post">
            @csrf
            <div class="form-group">
            	<label for="">Tahun Angkatan</label>
                <input type="text" name="ruangan" class="form-control" value="{{$tahunangkatan->tahun_angkatan}}">
            </div>

			<button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
