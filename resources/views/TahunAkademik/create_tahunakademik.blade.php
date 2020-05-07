@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Tambah Tahun Akademik</h1>
</div>
<div class="alert alert-primary"><i class="fas fa-info"></i>&nbsp;&nbsp;&nbsp; Tahun Akademik harus berformat tahun dan semester seperti 20181</div>
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
                <select name="keterangan" class="form-control">
                    <option>Semester Ganjil</option>
                    <option>Semester Genap</option>
                </select>
            </div>

            <div class="form-group">
                <label for="">Status</label>
                <select name="status"  class="form-control">
                    <option disabled selected>-- Pilih Status --</option>
                    <option value="aktif" >Aktif</option>
                    <option value="tidak aktif" >Tidak Aktif</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('tahunakademik.index') }}" class="btn btn-light ml-2" >Kembali</a>
        </form>
    </div>
</div>
@endsection
