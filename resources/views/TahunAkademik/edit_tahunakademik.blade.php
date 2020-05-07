@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Edit Data Tahun Angkatan</h1>
</div>
<div class="card">
    <div class="card-body">
        <form action="{{route('tahunakademik.update',$tahun_akademik->id)}}" method="post">
            @csrf
            @method('PATCH')
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
                    <option value="" disabled selected>-- Pilih Status --</option>
                    <option value="aktif" @if($tahun_akademik->status == "aktif") selected @endif >Aktif</option>
                    <option value="tidak aktif" @if($tahun_akademik->status == "tidak aktif") selected @endif>Tidak Aktif</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('tahunakademik.index') }}" class="btn btn-light ml-2" >Kembali</a>
        </form>
    </div>
</div>
@endsection
