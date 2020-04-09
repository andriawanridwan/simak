@extends('layouts.master')

@section('content')
   <div class="section-header">
            <h1>Daftar Mahasiswa</h1>
    </div>
    <div class="card">
        <div class="card-body">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Biodata</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Orang Tua</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <table class="table table-striped ">
                    <tr>
                        <th style="max-width:100px;">Nim</th>
                        <td style="max-width:5px;">:</td>
                        <td>{{ $mahasiswa->nim }}</td>
                    </tr>
                    <tr> 
                        <th style="max-width:100px;">Nama</th>
                        <td style="max-width:5px;">:</td>
                        <td>{{$mahasiswa->nama}}</td>
                    </tr>
                    <tr>
                        <th style="max-width:100px;">Jenis Kelamin</th>
                        <td style="max-width:5px;">:</td>
                        <td>{{$mahasiswa->jk}}</td>
                    </tr>
                    <tr>
                        <th style="max-width:100px;">Agama</th>
                        <td style="max-width:5px;">:</td>
                        <td>{{$mahasiswa->agama}}</td>
                    </tr>
                    <tr>
                        <th style="max-width:100px;">Tempat, Tanggal Lahir</th>
                        <td style="max-width:5px;">:</td>
                        <td>{{$mahasiswa->tempat_lahir}}, {{$mahasiswa->tanggal_lahir}}</td>
                    </tr>
                    <tr>
                        <th style="max-width:100px;">Alamat</th>
                        <td style="max-width:5px;">:</td>
                        <td>{{ $mahasiswa->alamat }}</td>
                    </tr>
                    <tr>
                        <th style="max-width:100px;">Tahun Angkatan</th>
                        <td style="max-width:5px;">:</td>
                        <td>{{ $mahasiswa->tahun_angkatan->tahun_angkatan }}</td>
                    </tr>
                    <tr>
                        <th style="max-width:100px;">Prodi</th>
                        <td style="max-width:5px;">:</td>
                        <td>{{$mahasiswa->prodi->prodi}}</td>
                    </tr>
                    <tr>
                        <th style="max-width:100px;">konsentrasi</th>
                        <td style="max-width:5px;">:</td>
                        <td>{{$mahasiswa->konsentrasi->konsentrasi}}</td>
                    </tr>
                </table>
            </div>

            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <table class="table table-striped"> 
                     <tr>
                        <th style="max-width:100px;">NIK Ayah</th>
                        <td style="max-width:5px;">:</td>
                        <td>{{$mahasiswa->nik_ayah}}</td>
                    </tr>
                    <tr>
                        <th style="max-width:100px;">Nama Ayah</th>
                        <td style="max-width:5px;">:</td>
                        <td>{{$mahasiswa->nama_ayah}}</td>
                    </tr>
                    <tr>
                        <th style="max-width:100px;">Pekerjaan Ayah</th>
                        <td style="max-width:5px;">:</td>
                        <td>{{$mahasiswa->pekerjaan_ayah}}</td>
                    </tr>
                    <tr>
                        <th style="max-width:100px;">NIK Ibu</th>
                        <td style="max-width:5px;">:</td>
                        <td>{{$mahasiswa->nik_ibu}}</td>
                    </tr>
                    <tr>
                        <th style="max-width:100px;">Nama Ibu</th>
                        <td style="max-width:5px;">:</td>
                        <td>{{$mahasiswa->nama_ibu}}</td>
                    </tr>
                    <tr>
                        <th style="max-width:100px;">Pekerjaan Ibu</th>
                        <td style="max-width:5px;">:</td>
                        <td>{{$mahasiswa->pekerjaan_ibu}}</td>
                    </tr>
                </table>
            </div>
            <a href="{{route('mahasiswa.index')}}" class="btn btn-light">Kembali</a>
        </div>
    </div>

@endsection