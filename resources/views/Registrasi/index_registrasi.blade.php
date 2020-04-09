@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Daftar Ulang Mahasiswa</h1>
</div>
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
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Konsentrasi</label>
                    <select name="" id="konsentrasi" class="form-control">
                        <option value="" disabled selected> -- Pilih Konsentrasi --</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Tahun Angkatan</label>
                    <select name="" id="tahun_angkatan" class="form-control">
                        <option value="" disabled selected> -- Pilih Tahun Angkatan --</option>
                        @foreach($tahun_angkatan as $ta)
                            <option value="{{ $ta->id }}">{{ $ta->tahun_angkatan }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Tahun Akademik</label>
                    <select name="" id="tahun_akademik" class="form-control">
                        <option value="" disabled selected> -- Pilih Tahun Akademik --</option>
                        @foreach($tahun_akademik as $ta)
                            <option value="{{ $ta->id }}">{{ $ta->tahun_akademik }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
                
        <table id="myTable" style="width:100%;" class="table table-bordered table-striped table-responsive">
            <thead>
                <tr>
                    <th>No</th>
                    <th width="15%">NIM</th>
                    <th width="40%">Nama</th>
                    <th width="10%">Tahun Akd</th>
                    <th>Status</th>
                    <th width="15%">Tanggal Registrasi</th>
                    <th width="20%">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- <tr>
                    <td>1</td>
                    <td>12345</td>
                    <td>Andriawan Ridwan</td>
                    <td>20181</td>
                    <td>Aktif</td>
                    <td>24-04-2020</td>
                    <td><button class="btn btn-success">Registrasi</button></td>
                </tr> -->
            </tbody>
        </table>    
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

function loadtable(prodi,konsentrasi,tahun_angkatan,tahun_akademik){
     $('#myTable tbody').empty();
     $.ajax({
        url : " {{ route('registrasi.cari') }} ",
        type : "post",
        data : {prodi:prodi, konsentrasi:konsentrasi,tahun_angkatan:tahun_angkatan, tahun_akademik:tahun_akademik},
        success:function(data){
            var table = '';
            var i = 1;
            $.each(data,function(index,item){
                
                table += '<tr>';
                table += '<td>'+ i +'</td>';
                table += '<td id="nim">'+ item.nim +'</td>';
                table += '<td>'+ item.nama +'</td>';
                table += '<td>'+ item.tahun_akd +'</td>';
                table += '<td>'+ item.status +'</td>';
                table += '<td>'+ item.tanggal_registrasi +'</td>';
                table += '<td style="text-align:center">'+ item.action +'</td>';
                table += '</tr>';
                i++;
            })
            $('#myTable tbody').append(table);
        }
    })
}
$('#tahun_akademik').change(function(){
    var prodi = $('#prodi').val();
    var konsentrasi = $('#konsentrasi').val();
    var tahun_angkatan = $('#tahun_angkatan').val();
    var tahun_akademik = $('#tahun_akademik').val();
    
    loadtable(prodi,konsentrasi,tahun_angkatan,tahun_akademik);
});

$(document).on('click','#action',function(){
    var prodi = $('#prodi').val();
    var konsentrasi = $('#konsentrasi').val();
    var tahun_angkatan = $('#tahun_angkatan').val();
    var tahun_akademik = $('#tahun_akademik').val();
    var text = $(this).text();
    var id = $(this).parent().parent().find('#nim').text();
    if(text == 'Batal Registrasi'){
        var link = 'registrasi/delete/' + id;
        $.ajax({
        url : link,
        type : 'get',
        data: '',
        success:function(data){
            loadtable(prodi,konsentrasi,tahun_angkatan,tahun_akademik);
        }
    })

    }else{
        var link = '{{ route("registrasi.store") }}';
        $.ajax({
        url : link,
        type : 'post',
        data: {nim :id,tahun_akademik_id:tahun_akademik},
        success:function(data){
            loadtable(prodi,konsentrasi,tahun_angkatan,tahun_akademik);
        }
      })
    }
    

});
</script>
@endpush