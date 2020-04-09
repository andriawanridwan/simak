@extends('layouts.master')

@section('content')
    <div class="section-header">
            <h1>Daftar Mahasiswa</h1>
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
            <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary ">+ Tambah Data</a>
            <br><br>
            <form>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Prodi</label>
                        <select name="prodi" id="prodi" class="form-control">
                             <option value="" disabled selected>-- Pilih Prodi --</option>
                                    @foreach($so_prodi as $p)
                                        <option {{$p->id == Request::get('prodi') ? 'selected' : '' }} value="{{ $p->id }}">{{ $p->prodi }}</option>
                                    @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Konsentrasi</label>
                        <select name="konsentrasi" id="konsentrasi" class="form-control">
                              <option value="" disabled selected>-- Pilih Konsentrasi --</option>
                               
                                    @foreach($so_konsentrasi as $k)
                                        <option {{$k->id == Request::get('konsentrasi') ? 'selected' : '' }} value="{{ $k->id }}">{{ $k->konsentrasi }}</option>
                                    @endforeach
                            
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Tahun Angkatan</label>
                        <select name="tahun_angkatan" id="" class="form-control">
                              <option value="" disabled selected>-- Pilih Tahun Angkatan --</option>
                            @foreach($so_tahun_angkatan as $ta)
                                <option {{$ta->id == Request::get('tahun_angkatan') ? 'selected' : '' }} value="{{$ta->id}}">{{ $ta->tahun_angkatan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for=""></label>
                        <button type="submit" class="btn btn-primary mt-2 form-control">Submit</button>
                    </div>
                </div>
                </form>
            </div>

            @isset($mahasiswa)
               
                <table id="example" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="max-width:10px;">No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Jk</th>
                            <th>Alamat</th>
                            <th style="max-width:100px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($mahasiswa as $m)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $m->nim }}</td>
                            <td>{{ $m->nama }}</td>
                            <td>{{ $m->jk }}</td>
                            <td>{{ $m->alamat }}</td>
                            <td>
                                <div class="btn-group">
                                <a href="{{ route('mahasiswa.show',$m->nim) }}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                </div>
                                <div class="btn-group">
                                <a href="{{ route('mahasiswa.edit', $m->nim) }}" class="btn btn-success"><i class="fas fa-pencil-alt"></i></a>
                                </div>
                                <div class="btn-group">
                                    <form action="{{route('mahasiswa.destroy',$m->nim)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                     
                    </tbody>
                </table>
                
            @endisset 
        </div>
    </div>
@endsection
@push('myjs')
<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );

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