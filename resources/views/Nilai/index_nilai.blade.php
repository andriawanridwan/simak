@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Penilaian</h1>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <table class="table table-bordered">
                    <tr>
                        <td class="bg-primary text-center text-white">Kelas Ajar</td>
                    </tr>
                    <tr>
                        <td class="text-center">Tahun Akademik {{$akademik->tahun_akademik}}</td>
                    </tr>
                    <form>
                    <tr>
                        <td>
                            <select name="matkul" id="" class="form-control">
                                <option disabled selected>-- Pilih Matkul --</option>
                                @foreach($matkul as $m)
                                    <option {{Request::get('matkul') == $m->matkul_id ? 'selected' : ''}} value="{{$m->matkul_id}}">{{$m->matkul->matkul}}</option>
                                @endforeach
                            </select>
                        </td>
                        
                    </tr>
                    <tr>
                        <td><button type="submit" class="btn btn-primary form-control">Submit</button></td>
                    </tr>
                    </form>
                </table>
            </div>
    @if(Request::get('matkul'))
            <div class="col-md-9">
                <table class="table table-bordered">
                    <tr>
                        <td colspan="2" class="bg-primary text-center text-white"><strong>MATAKULIAH</strong></td>
                    </tr>
                    <tr>
                        <td width="25%">Matakuliah</td>
                        <td>{{$fmatkul->matkul}}</td>
                    </tr>
                    <tr>
                        <td width="25%">Dosen</td>
                        <td>{{$dosen->nama}}</td>
                    </tr>
                </table>
                <table class="table table-bordered">
                    <tr>
                        <td colspan="7" class="bg-primary text-center text-white"><strong>FORM NILAI MAHASISWA</strong></td>
                    </tr>
                    <tr>
                        <td><strong>No</strong>  </td>
                        <td><strong>NIM</strong> </td>
                        <td><strong>Nama Mahasiswa</strong> </td>
                        <td><strong>Kehadiran</strong> </td>
                        <td><strong>Tugas</strong> </td>
                        <td><strong>Mutu</strong> </td>
                        <td><strong>Grade</strong> </td>
                    </tr>
                    @isset($khs)
                        @foreach($khs as $k)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$k->nim}}</td>
                            <td width="25%">{{$k->mahasiswa['nama']}}</td>
                            <td width="12%"><input type="text" class="form-control kehadiran" value="{{$k->kehadiran}}"></td>
                            <td width="12%"><input type="text" class="form-control tugas" value="{{$k->tugas}}"></td>
                            <td width="12%"><input type="text" class="form-control mutu" value="{{$k->mutu}}"></td>
                            <td width="12%">
                                <select name="" id="" class="form-control grade">
                                    <option disabled selected value="">-</option>
                                    <option {{$k->grade == 'A' ? 'selected' : ''}} >A</option>
                                    <option {{$k->grade == 'B' ? 'selected' : ''}} >B</option>
                                    <option {{$k->grade == 'C' ? 'selected' : ''}} >C</option>
                                    <option {{$k->grade == 'D' ? 'selected' : ''}} >D</option>
                                    <option {{$k->grade == 'E' ? 'selected' : ''}} >E</option>
                                </select>
                            </td>
                        </tr>
                        @endforeach
                    @endisset
                    
                </table>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('myjs')
<script>
    $('.kehadiran').keyup(function(){
        var nim = $(this).parent().parent().find('td:nth-child(2)').text();
        var nilai = $(this).val();
        $.ajax({
            url : 'nilaikehadiran/' + nim + '/' + nilai
        });
        
    });
    $('.tugas').keyup(function(){
         var nim = $(this).parent().parent().find('td:nth-child(2)').text();
         var nilai = $(this).val();
        $.ajax({
            url : 'nilaitugas/' + nim + '/' + nilai
        });
    });
    $('.mutu').keyup(function(){
         var nim = $(this).parent().parent().find('td:nth-child(2)').text();
         var nilai = $(this).val();
        $.ajax({
            url : 'nilaimutu/' + nim + '/' + nilai
        });
    });
    $('.grade').change(function(){
        var nim = $(this).parent().parent().find('td:nth-child(2)').text();
        var nilai = $(this).val();
        $.ajax({
            url : 'nilaigrade/' + nim + '/' + nilai
        });
    });
</script>
@endpush