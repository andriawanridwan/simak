@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Edit Data Dosen</h1>
</div>
<div class="card">
    <div class="card-body">
        <form action="/dosen/{{$dosen->nip}}/update" method="post">
            @csrf
            <div class="form-group">
                <label>NIP</label>
                <input type="text" name="nip" class="form-control" value="{{$dosen->nip}}"> 
            </div>

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="{{$dosen->nama}}"> 
            </div>

            <div class="form-group">
                <label>No Telp</label>
                <input type="text" name="no_telp" class="form-control" value="{{$dosen->no_telp}}"> 
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{$dosen->email}}"> 
            </div>

            <div class="form-group">
                <label for="">Prodi</label>
                <select name="prodi"  class="form-control">
                    <option disabled selected>-- Pilih Status --</option>
                    @foreach($data_prodi as $prodi)
                    <option value="{{$prodi->prodi}}"@if($prodi->prodi == $dosen->prodi) selected @endif >{{$prodi->prodi}}</option>
                    @endforeach
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('dosen.index') }}" class="btn btn-light ml-2" >Kembali</a>

        </form>
    </div>
</div>
@endsection
