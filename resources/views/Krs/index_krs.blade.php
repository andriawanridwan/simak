@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Krs Mahasiswa</h1>
</div>
<div class="alert alert-primary"><i class="fas fa-info"></i>&nbsp;&nbsp;&nbsp; Pastikan Mahasiswa Sudah Daftar Akademik / Daftar Ulang</div>

<div class="card">
    <div class="card-body">
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
                    <label for="">Nama</label>
                    <select name="" id="nama" class="form-control">
                        <option value="" disabled selected>-- Pilih Nama --</option>
                       
                    </select>
                </div>
            </div>

            <div class="col-md-9">
                <div id="isitable"></div>
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

$('#konsentrasi').change(function(){
    var prodi = $('#prodi').val();
    var konsentrasi = $(this).val();
    $.ajax({
        url : "{{ route('krs.cari') }}",
        type : 'post',
        data : {prodi:prodi,konsentrasi:konsentrasi},
        success:function(data){
            var opt = '<option value="" disabled selected>-- Pilih Nama --</option>';
            $('#nama').empty().append(opt);
            $.each(data,function(index,item){
                $('#nama').append($("<option/>", {
                                            value: item.nim,
                                            text: item.nama
                                        }));
            })
        }
    });
});
$('#nama').change(function(){
    var nim = $(this).val();
    $.ajax({
        url : "{{ route('krs.carinama') }}",
        type : 'post',
        data : {nim:nim},
        success:function(data){
            var table = "";
            table += '<table class="table table-bordered ">';
                table += '<tr>';
                    table += '<td colspan="4"><a href="krs/'+data[1].nim+'" class="btn btn-primary btn-sm">Input Krs</a>';
                    table += '<a href="cetakkrs/'+data[1].nim+'" class="btn btn-success btn-sm"><i class="fas fa-print"></i> Cetak Krs</a></td>';
                table += '</tr>';
                table += '<tr>';
                    table += '<td>Nama</td>';
                    table += '<td>NIM</td>';
                    table += '<td>Semester</td>';
                table += '</tr>';
                table += '<tr>';
                    table += '<td>'+data[1].mahasiswa.nama+'</td>';
                    table += '<td>'+data[1].nim+'</td>';
                    table += '<td>'+data[1].tahun_akademik.tahun_akademik.substring(4)+'</td>';
                table += '</tr>';
            table += '</table>';

            table += '<table class="table table-bordered table-responsive">';

                table += '<tr>';
                    table += '<td style="text-align:center">No</td>';
                    table += '<td style="text-align:center">Kode</td>';
                    table += '<td style="text-align:center" width="30%">Nama Matakuliah</td>';
                    table += '<td style="text-align:center">Sks</td>';
                    table += '<td style="text-align:center" width="30%">Dosen</td>';
                    table += '<td style="text-align:center">Action</td>';
                table += '</tr>';
                var i = 1;
                var total_sks = 0;
                $.each(data[0],function(index,item){
                    table += '<tr>';
                        table += '<td>'+i+'</td>';
                        table += '<td>'+item.jadwal.matkul.kode_matkul+'</td>';
                        table += '<td>'+item.jadwal.matkul.matkul+'</td>';
                        table += '<td>'+item.jadwal.matkul.sks+'</td>';
                        if(item.jadwal.dosen == null){
                            table += '<td>Not Set</td>';
                        }else{
                            table += '<td>'+item.jadwal.dosen.nama+'</td>';
                        }
                        table += '<td style="text-align:center"><input id="jadwal_id" type="hidden" value="'+item.jadwal_id+'"><button id="hapus" class="btn btn-danger"><i class="fas fa-trash"></button></td>';
                    table += '</tr>';
                    total_sks += item.jadwal.matkul.sks;
                });
                table += '<tr>';
                        table += '<td colspan="3" class="text-right">Total Sks</td>';
                        table += '<td id="total_sks">'+total_sks+'</td>';
                        table += '<td colspan="2"></td>';
                    table += '</tr>';
                
            table += '</table>';


            $('#isitable').append(table);
        }
    });
});

$(document).on('click','#hapus', function(data){
 var id = $(this).parent().find('#jadwal_id').val();
 var t = $(this);
    $.ajax({
        url : 'krs/delete/' + id,
        success:function(data){
            var total_sks = t.parent().parent().parent().find('#total_sks').text();
            var sks = t.parent().parent().find('td:nth-child(4)').text();
            var hasil = total_sks - sks;
            t.parent().parent().parent().find('#total_sks').text(hasil);
            t.parent().parent().hide();
        }
    });
});

</script>
@endpush