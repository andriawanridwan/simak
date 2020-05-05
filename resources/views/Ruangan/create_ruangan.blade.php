@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Tambah Ruangan</h1>
</div>
<div class="card">
    <div class="card-body">
        <form action="{{ route('ruangan.store') }}" method="post">
            @csrf
            <div class="form-group">
            	<label for="">Ruangan</label>
                <input type="text" name="ruangan" class="form-control">
            </div>

			<button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
