@extends('layouts.master')

@section('content')
    <div class="section-header">
            <h1>Tambah Mahasiswa</h1>
    </div>

    <div class="card">
        <div class="card-header">
        <h4>Tambah Mahasiswa</h4>
        </div>
        <div class="card-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Biodata</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Orang Tua</a>
            </li>
        </ul>
        <form action="{{ route('mahasiswa.store') }}" method="post">
        @csrf
        <div class="tab-content" id="myTabContent">
            
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">NIM</label>
                        <input type="text" name="nim" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select name="jk" id="" class="form-control">
                            <option>Laki - laki</option>
                            <option>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Agama</label>
                        <select name="agama" id="" class="form-control">
                            <option value="">-- Pilih Agama --</option>
                            <option>Budha</option>
                            <option>Hindu</option>
                            <option>Islam</option>
                            <option>Katholik</option>
                            <option>Protestan</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Tempat, Tanggal Lahir</label>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="tempat_lahir" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <input type="date" name="tanggal_lahir" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Tahun Angkatan</label>
                        <select name="tahun_angkatan_id" id="" class="form-control">
                            <option value="" disabled>-- Pilih Tahun Angkatan --</option>
                            @foreach($tahun_angkatan as $ta)
                                <option value="{{$ta->id}}">{{ $ta->tahun_angkatan }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Prodi, Konsentrasi</label>
                        <div class="row">
                            <div class="col-md-6">
                                <select name="prodi_id" id="" class="form-control">
                                    <option value="" disabled>-- Pilih Prodi --</option>
                                    @foreach($prodi as $p)
                                        <option value="{{ $p->id }}">{{ $p->prodi }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select name="konsentrasi_id" id="" class="form-control">
                                    <option value="" disabled>-- Pilih Konsentrasi --</option>
                                    @foreach($konsentrasi as $k)
                                        <option value="{{ $k->id }}">{{ $k->konsentrasi }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea name="alamat" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            
            </div>

            <!-- Orang Tua -->
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">NIK Ayah</label>
                            <input type="text" name="nik_ayah" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Ayah</label>
                            <input type="text" name="nama_ayah" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Pekerjaan Ayah</label>
                            <input type="text" name="pekerjaan_ayah" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">NIK Ibu</label>
                            <input type="text" name="nik_ibu" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Ibu</label>
                            <input type="text" name="nama_ibu" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Pekerjaan Ibu</label>
                            <input type="text" name="pekerjaan_ibu" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-light" >Kembali</a>
            </form>
        </div>

        <div class="card-footer">
            
        </div>
    </div>
@endsection