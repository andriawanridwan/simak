@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Edit Data Tahun Angkatan</h1>
</div>
<div class="card">
    <div class="card-body">
        <form action="/tahunakademik/{{$tahun_akademik->id}}/update" method="post">
            @csrf

            <div class="form-group">
                <label>Tahun Akademik</label>
                <input type="text" name="tahun_akademik" class="form-control" value="{{$tahun_akademik->tahun_akademik}}"> 
            </div>

            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" name="keterangan" class="form-control" value="{{$tahun_akademik->keterangan}}"> 
            </div>

            <div class="form-group">
                <label for="">Status</label>
                <select name="status"  class="form-control">

                    <option value="Aktif" @if($tahun_akademik->status == "Aktif") selected @endif >Aktif</option>
                    <option value="Tidak Aktif" @if($tahun_akademik->status == "Tidak Aktif") selected @endif>Tidak Aktif</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('tahunakademik.index') }}" class="btn btn-light ml-2" >Kembali</a>
        </form>
    </div>
</div>
@endsection
