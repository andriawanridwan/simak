@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Tambah Mata Kuliah</h1>
</div>
<div class="card">
    <div class="card-body">
        <form action="{{ route('matkul.update', $matkul->kode_matkul) }}" method="post">
            @csrf
            @method('patch')
            <div class="form-group">
            	<label for="">Kode Mata Kuliah</label>
                <input type="text" name="kode_matkul" class="form-control" value="{{$matkul->kode_matkul}}" readonly="">
                <label for="">Prodi</label>
                    <select name="prodi_id" id="prodi" class="form-control" required>
                        <option value="" disabled selected> -- Pilih Prodi --</option>
                        @foreach($prodi as $p)
                        <option {{$matkul->prodi_id == $p->id ? 'selected' : ''}} value="{{ $p->id }}">{{ $p->prodi }}</option>
                        @endforeach
                    </select>
                <label for="">Konsentrasi</label>
                    <select name="konsentrasi_id" id="konsentrasi" class="form-control" required>
                        <option value="" disabled selected> -- Pilih Konsentrasi --</option>
                        @foreach($konsentrasi as $k)
                        <option {{$matkul->konsentrasi_id == $k->id ? 'selected' : ''}} value="{{$k->id}}">{{$k->konsentrasi}}</option>
                        @endforeach
                    </select>
                
                <label>Mata Kuliah</label>
                <input type="text" name="matkul" value="{{$matkul->matkul}}" class="form-control" required>
                <label>SKS</label>
                <input type="text" name="sks" value="{{$matkul->sks}}" class="form-control" required>
                <label>Semester</label>
                <select class="form-control" name="semester" required>
                	<option>--Pilih Semester--</option>
                	<option {{$matkul->sks == 1 ? 'selected' : ''}} value="1">Semester 1</option>
                	<option {{$matkul->sks == 2 ? 'selected' : ''}} value="2">Semester 2</option>
                	<option {{$matkul->sks == 3 ? 'selected' : ''}} value="3">Semester 3</option>
                	<option {{$matkul->sks == 4 ? 'selected' : ''}} value="4">Semester 4</option>
                	<option {{$matkul->sks == 5 ? 'selected' : ''}} value="5">Semester 5</option>
                	<option {{$matkul->sks == 6 ? 'selected' : ''}} value="6">Semester 6</option>
                    <option {{$matkul->sks == 7 ? 'selected' : ''}} value="7">Semester 7</option>
                    <option {{$matkul->sks == 8 ? 'selected' : ''}} value="8">Semester 8</option>
                </select>
            </div>

			<button type="submit" class="btn btn-primary">Update</button>

        </form>
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
</script>
@endpush

