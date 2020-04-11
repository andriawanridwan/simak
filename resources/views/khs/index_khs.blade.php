@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Khs Mahasiswa</h1>
</div>
<div class="alert alert-primary"><i class="fas fa-info"></i>&nbsp;&nbsp;&nbsp; Pastikan Mahasiswa Sudah Daftar Akademik / Daftar Ulang</div>
<div class="card">
    <div class="card-body">
    <form >
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Prodi</label>
                    <select name="" id="prodi" class="form-control">
                        <option value="" disabled selected> -- Pilih Prodi --</option>
                        @foreach($prodi as $p)
                        <option value="{{ $p->id }}">{{ $p->prodi }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Konsentrasi</label>
                    <select name="" id="konsentrasi" class="form-control">
                        <option value="" disabled selected> -- Pilih Konsentrasi --</option>
                    </select>
                </div>  

                <div class="form-group">
                    <label for="">Tahun Angkatan</label>
                    <select name="" id="tahun_angkatan" class="form-control">
                        <option value="" disabled selected>-- Pilih Tahun Angkatan --</option>
                        @foreach($tahun_angkatan as $ta)
                            <option value="{{$ta->id}}">{{$ta->tahun_angkatan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Nama</label>
                    <select name="nim" id="nama" class="form-control">
                        <option value="" disabled selected>-- Pilih Nama --</option>
                       
                    </select>
                </div>
                 <div class="form-group">
                    <label for="">Semester</label>
                    <select name="semester" id="semester" class="form-control">
                        <option value="" disabled selected>-- Pilih Semester --</option>
                        <option value="1">Semester 1</option>
                        <option value="2">Semester 2</option>
                        <option value="3">Semester 3</option>
                        <option value="4">Semester 4</option>
                        <option value="5">Semester 5</option>
                        <option value="6">Semester 6</option>
                        <option value="7">Semester 7</option>
                        <option value="8">Semester 8</option>
                    </select>
                </div>
                 <button type="text" class="btn btn-primary form-control">Submit</button>
            </div>
            <div class="col-md-9">
            @if(Request::get('nim'))
                <table class="table table-bordered">
                    <tr>
                        <td>NIM</td>
                        <td>Nama</td>
                        <td>Semester</td>
                    </tr>
                    <tr>
                        <td>{{$mahasiswa->nim}}</td>
                        <td>{{$mahasiswa->mahasiswa->nama}}</td>
                        <td>{{ substr($mahasiswa->tahun_akademik->tahun_akademik,4)}}</td>
                    </tr>

                </table>
                <table class="table table-bordered">
                    <tr>
                        <td>No</td>
                        <td>Kode</td>
                        <td>Matakuliah</td>
                        <td>Dosen</td>
                        <td>Grade</td>
                        <td>Sks</td>
                        <td>Mutu</td>
                        <td>Sks x Mutu</td>
                    </tr>
                    <?php $i = 0 ?>
                    @foreach($khs as $k)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $k->krs->jadwal->matkul->kode_matkul }}</td>
                            <td>{{ $k->krs->jadwal->matkul->matkul }}</td>
                            <td>{{ $k->krs->jadwal->dosen->nama }}</td>
                            <td>{{ $k->grade }}</td>
                            <td>{{ $k->krs->jadwal->matkul->sks}}</td>
                            <td>{{ $k->mutu}}</td>
                            <td>{{ $k->krs->jadwal->matkul->sks * $k->mutu}}</td>
                        </tr>
                        <?php $i += $k->krs->jadwal->matkul->sks ?>
                        
                    @endforeach
                    <tr>
                        <td colspan="5" class="text-right">Total Sks</td>
                        <td>{{$i}}</td>
                    </tr>
                </table>
            @endif
            </div>
               
            

        </div>
    </div>
</div>

@endsection
@push('myjs')
<script>
$('#prodi').change(function(){
    var id = $(this).val();
    $.ajax({
        url : "{{ route('mahasiswa.cekkonsentrasi') }}",
        type : 'POST',
        data : {id : id},
        success:function(data){
            var opt = '<option value="" disabled selected>-- Pilih Konsentrasi --</option>';
            $('#konsentrasi').empty().append(opt);

            $.each(data, function(index,item){
                $('#konsentrasi').append($("<option/>", {
                                            value: item.id,
                                            text: item.konsentrasi
                                        }));
            });
        }
    });
})
$('#tahun_angkatan').change(function(){
    var prodi = $('#prodi').val();
    var konsentrasi = $('#konsentrasi').val();
    var tahun_angkatan = $('#tahun_angkatan').val();
    $.ajax({
        url : '{{ route("khs.cari") }}',
        type : 'post',
        data : {prodi:prodi,konsentrasi:konsentrasi,tahun_angkatan:tahun_angkatan},
        success:function(data){
            var opt = '<option value="" disabled selected>-- Pilih Nama --</option>';
            $('#nama').empty().append(opt);

            $.each(data, function(index,item){
                $('#nama').append($("<option/>", {
                                            value: item.nim,
                                            text: item.nama
                                        }));
            });
        }

    });
});

</script>
@endpush