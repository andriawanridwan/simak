@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Jadwal Kuliah</h1>
</div>
<div class="alert alert-primary"><i class="fas fa-info"></i>&nbsp;&nbsp;&nbsp; Jadwal Kuliah Autosave</div>
<div class="card">
    <div class="card-body">
       <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Tahun Akademik</label>
                    <select name="" id="tahun_akademik" class="form-control">
                        <option value="" disabled selected>-- Pilih Tahun Akademik --</option>
                        @foreach($tahun_akademik as $ta)
                            <option value="{{ $ta->id }}">{{ $ta->tahun_akademik }}</option>
                        @endforeach
                        
                    </select>
                </div>
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
                    <label for="">Semester</label>
                    <select name="" id="semester" class="form-control">
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
            </div>
            <div class="col-md-9">
                <div class="table-responsive">
                      <table class="table table-bordered table-md">
                        <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th class="text-center">Hari</th>
                          <th class="text-center">Kode</th>
                          <th class="text-center">Matakuliah</th>
                          <th class="text-center">Sks</th>
                          <th class="text-center">Ruang</th>
                          <th class="text-center">Jam</th>
                          <th class="text-center">Dosen</th>
                        </tr>
                        </thead>
                    
                        <tbody>
                           
                        </tbody>
                        
                       
                      </table>
                    </div>
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
$('#semester').change(function(){
    var prodi = $('#prodi').val();
    var konsentrasi = $('#konsentrasi').val();
    var semester = $("#semester").val();
    $.ajax({
        url : '{{ route("jadwal.cari") }}',
        type : 'post',
        data : {prodi:prodi,konsentrasi:konsentrasi,semester:semester},
        success:function(data){
            $('table tbody').empty();
            var table = '';
            if(data[0].length == 0){
                table += '<tr><td colspan="8" style="text-align:center">Semester '+semester+'</td></tr>';
                table += '<tr><td colspan="8" style="text-align:center">Tidak Ada Data</td></tr>';
            }
            else{
                table += '<tr><td colspan="8" style="text-align:center">Semester '+data[0][1].semester+'</td></tr>';
                var i = 1;

                $.each(data[3], function(index,item){
                    var hari = '';
                    if(item.hari != null){
                        hari += '<select id="hari" class="form-control">';
                        hari += '<option disabled selected>Pilih</option>';
                        if(item.hari == 'Senin') 
                        hari +=  '<option selected >Senin</option>';
                        else hari +=  '<option>Senin</option>';
                        if(item.hari == 'Selasa')
                        hari +=  '<option selected>Selasa</option>';
                        else hari +=  '<option>Selasa</option>';
                        if(item.hari == 'Rabu')
                        hari +=  '<option selected>Rabu</option>';
                        else hari +=  '<option>Rabu</option>';
                        if(item.hari == 'Kamis')
                        hari +=  '<option selected>Kamis</option>';
                        else hari +=  '<option>Kamis</option>';
                        if(item.hari == 'Jumat')
                        hari +=  '<option selected>Jumat</option>';
                        else hari +=  '<option>Jumat</option>';
                        if(item.hari == 'Sabtu')
                        hari +=  '<option selected>Sabtu</option>';
                        else hari +=  '<option>Sabtu</option>';
                        if(item.hari == 'Minggu')
                        hari +=  '<option selected>Minggu</option>';
                        else hari +=  '<option>Minggu</option>';
                        hari +=  '</select>';
                    }else{
                        hari += '<select id="hari" class="form-control">';
                        hari += '<option disabled selected>Pilih</option>';
                        hari +=  '<option>Senin</option>';
                        hari +=  '<option>Selasa</option>';
                        hari +=  '<option>Rabu</option>';
                        hari +=  '<option value="Kamis">Kamis</option>';
                        hari +=  '<option>Jumat</option>';
                        hari +=  '<option>Sabtu</option>';
                        hari +=  '<option>Minggu</option>';
                        hari +=  '</select>';
                    }


                    var dosen = '';
                    dosen += '<select id="dosen" class="form-control">';
                    dosen += '<option disabled selected>Pilih </option>';
                    $.each(data[2], function(index,element){
                        if(item.dosen_id != null){
                            if(item.dosen_id == element.nip){
                                dosen += '<option value="'+element.nip+'" selected>'+ element.nama +'</option>';
                            }else{
                                dosen += '<option value="'+element.nip+'">'+ element.nama +'</option>';   
                            }
                        }
                        else{
                             dosen += '<option value="'+element.nip+'">'+ element.nama +'</option>';
                        }
                    });
                    dosen += '</select>';

                    var jam = '';
                    if(item.jam_mulai != null){
                        jam += '<input type="time" value="'+item.jam_mulai+'" id="jam_awal" class="form-control">';
                    }else{
                        jam += '<input type="time" id="jam_awal" class="form-control">';
                    }
                    if(item.jam_selesai != null){
                        jam += '<input type="time" value="'+item.jam_selesai+'" id="jam_akhir" class="form-control">';
                    }else{
                        jam += '<input type="time" id="jam_akhir" class="form-control">';
                    }
                        ruangan = '';
                        ruangan += '<select id="ruangan" class="form-control">';
                        ruangan += '<option disabled selected>Pilih</option>';
                        $.each(data[1], function(index,element){
                            if(item.ruangan_id != null){
                                if(item.ruangan_id == element.id){
                                    ruangan += '<option value="'+element.id+'" selected>'+ element.ruangan +'</option>';
                                }else{
                                    ruangan += '<option value="'+element.id+'">'+ element.ruangan +'</option>';
                                }
                            }else{
                                ruangan += '<option value="'+element.id+'">'+ element.ruangan +'</option>';
                            }
                            
                        });
                        ruangan += '</select>';
                    
                    table += '<tr>';
                        table += '<td>'+ i +'</td>';
                        table += '<td>'+ hari +'</td>';
                        table += '<td id="kode">'+ item.matkul.kode_matkul +'</td>';
                        table += '<td>'+ item.matkul.matkul +'</td>';
                        table += '<td>'+ item.matkul.sks +'</td>';
                        table += '<td>'+ ruangan +'</td>';
                        table += '<td>'+ jam +'</td>';
                        table += '<td>'+ dosen +'</td>';
                    table += '</tr>';
                    i++;
                });
            }
            $('table tbody').append(table);
            
                
        }
    })
})
$(document).on('change','#hari', function(data){
    var prodi = $('#prodi').val();
    var konsentrasi = $('#konsentrasi').val();
    var hari = $(this).val();
    var tahun_akademik = $('#tahun_akademik').val();
    var kode = $(this).parent().parent().find('td:nth-child(3)').text();
    $.ajax({
        url : '{{ route("hari.update") }}',
        type : 'post',
        data : {prodi:prodi,konsentrasi:konsentrasi,hari:hari,tahun_akademik:tahun_akademik,kode:kode}
    })
})
$(document).on('change','#ruangan', function(data){
    var prodi = $('#prodi').val();
    var konsentrasi = $('#konsentrasi').val();
    var ruangan = $(this).val();
    var tahun_akademik = $('#tahun_akademik').val();
    var kode = $(this).parent().parent().find('td:nth-child(3)').text();
    $.ajax({
        url : '{{ route("ruangan_update") }}',
        type : 'post',
        data : {prodi:prodi,konsentrasi:konsentrasi,ruangan:ruangan,tahun_akademik:tahun_akademik,kode:kode}
    })
})
$(document).on('change','#dosen', function(data){
    var prodi = $('#prodi').val();
    var konsentrasi = $('#konsentrasi').val();
    var dosen = $('#dosen').val();
    var tahun_akademik = $('#tahun_akademik').val();
    var kode = $(this).parent().parent().find('td:nth-child(3)').text();
    $.ajax({
        url : '{{ route("dosen_update") }}',
        type : 'post',
        data : {prodi:prodi,konsentrasi:konsentrasi,dosen:dosen,tahun_akademik:tahun_akademik,kode:kode}
    })
})
$(document).on('keyup','#jam_awal', function(data){
    var prodi = $('#prodi').val();
    var konsentrasi = $('#konsentrasi').val();
    var jam_awal = $(this).val();
    var tahun_akademik = $('#tahun_akademik').val();
    var kode = $(this).parent().parent().find('td:nth-child(3)').text();
    $.ajax({
        url : '{{ route("jam_awal.update") }}',
        type : 'post',
        data : {prodi:prodi,konsentrasi:konsentrasi,jam_awal:jam_awal,tahun_akademik:tahun_akademik,kode:kode}
    })
})
$(document).on('keyup','#jam_akhir', function(data){
    var prodi = $('#prodi').val();
    var konsentrasi = $('#konsentrasi').val();
    var jam_akhir = $(this).val();
    var tahun_akademik = $('#tahun_akademik').val();
    var kode = $(this).parent().parent().find('td:nth-child(3)').text();
    $.ajax({
        url : '{{ route("jam_akhir.update") }}',
        type : 'post',
        data : {prodi:prodi,konsentrasi:konsentrasi,jam_akhir:jam_akhir,tahun_akademik:tahun_akademik,kode:kode}
    })
})


</script>
@endpush