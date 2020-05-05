@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Tambah Krs</h1>
</div>
 @if(session('pesan'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            {{ session('pesan') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
<div class="card">
    <div class="card-body">
        <!-- <table class="table table-bordered">
        <form action="">
            <tr>
                <td><select name="semester" id="" class="form-control">
                    <option value="" disabled selected>-- Pilih Semester --</option>
                    <option {{Request::get('semester') == 1 ? 'selected' : ''}} value="1" >Semester 1</option>
                    <option {{Request::get('semester') == 2 ? 'selected' : ''}} value="2">Semester 2</option>
                    <option {{Request::get('semester') == 3 ? 'selected' : ''}} value="3">Semester 3</option>
                    <option {{Request::get('semester') == 4 ? 'selected' : ''}} value="4">Semester 4</option>
                    <option {{Request::get('semester') == 5 ? 'selected' : ''}} value="5">Semester 5</option>
                    <option {{Request::get('semester') == 6 ? 'selected' : ''}} value="6">Semester 6</option>
                    <option {{Request::get('semester') == 7 ? 'selected' : ''}} value="7">Semester 7</option>
                    <option {{Request::get('semester') == 8 ? 'selected' : ''}} value="8">Semester 8</option>
                </select></td>
                <td>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </td>
            </tr>
        </form>
        </table> -->

        <table class="table table-bordered">
            <tr class="bg-primary text-center text-white">
                <th colspan="6">Daftar Matakuliah</th>
                <th><a href="{{route('krsmahasiswa')}}" class="btn btn-success">Kembali</a></th>
            </tr>
            <tr class="bg-primary text-center text-white">
                <th>No</th>
                <th>Semester</th>
                <th>Kode</th>
                <th>Nama Matakuliah</th>
                <th>Dosen</th>
                <th>Sks</th>
                <th>Ambil</th>
            </tr>
           
                @foreach($krs as $k)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$k->matkul->semester}}</td>
                    <td>{{$k->matkul_id}}</td>
                    <td>{{$k->matkul->matkul}}</td>
                    <td>{{$k->dosen->nama}}</td>
                    <td>{{$k->matkul->sks}}</td>
                    <td ><a href="{{route('tambahkrs.store',[Auth::user()->username,$k->id])}}" class="btn btn-primary form-control">Ambil</a></td>
                </tr>
                @endforeach
          
        </table>
    </div>
</div>

@endsection
@push('myjs')
<script>
$(document).ready(function() {
    $('#example').DataTable();
});
</script>
@endpush