@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Tambah Tahun Angkatan</h1>
</div>
<div class="card">
    <div class="card-body">
        <form action="{{ route('tahunakademik.create') }}" method="post">
            @csrf

            <div class="form-group">
                <label>Tahun Akademik</label>
                <input type="text" name="tahun_akademik" class="form-control"> 
            </div>

            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" name="keterangan" class="form-control"> 
            </div>

            <div class="form-group">
                <label for="">Status</label>
                <select name="status"  class="form-control">
                    <option disabled selected>-- Pilih Status --</option>
                    <option value="Aktif" >Aktif</option>
                    <option value="Tidak Aktif" >Tidak Aktif</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('tahunakademik.index') }}" class="btn btn-light ml-2" >Kembali</a>
        </form>
    </div>
</div>
@endsection
