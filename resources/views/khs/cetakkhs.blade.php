<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
 <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <title>Cetak Krs</title>
</head>
<style>
.borderless td, .borderless th {
    border: none;
}
</style>
<body onload="window.print()">
    <div class="container-fluid">
    <table width="100%" class="table table-bordered mt-3">
        <tr>
            <th class="text-center"><h5>UNIVERSITAS DHARMA NEGARA</h5></th>
        </tr>
        <tr>
             <th class="text-center"><h5>KARTU RENCANA STUDI</h5></th>
        </tr>
    </table>
    <table class="table borderless">
        <tr>
            <td width="15%" style="max-width:1000px;">Nama</td>
            <td width="2%">:</td>
            <td>{{$khs[0]->mahasiswa->nama}}</td>
        </tr>
        <tr>
            <td width="15%">NIM / semester</td>
            <td width="2%">:</td>
            <td>{{$khs[0]->nim}} / {{$khs[0]->krs->jadwal->tahun_akademik->tahun_akademik}}</td>
        </tr>
        <tr>
            <td width="15%">Program Studi</td>
            <td width="2%">:</td>
            <td>{{$khs[0]->mahasiswa->prodi->prodi}}</td>
        </tr>
        <tr>
            <td width="15%">Konsentrasi</td>
            <td width="2%">:</td>
            <td>{{ $khs[0]->mahasiswa->konsentrasi->konsentrasi }}</td>
        </tr>
    </table>
    <table class="table table-bordered">
        <tr>
            <th>NO</th>
            <th>KODE</th>
            <th>MATAKULIAH</th>
            <th>SKS</th>
            <th>NILAI</th>
            <th>MUTU</th>
        </tr>

        @foreach($khs as $k)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$k->krs->jadwal->matkul_id}}</td>
                <td>{{$k->krs->jadwal->matkul->matkul}}</td>
                <td>{{$k->krs->jadwal->matkul->sks}}</td>
                <td>{{$k->grade}}</td>
                <td>{{$k->mutu}}</td>
            </tr>
        @endforeach
       
    </table>
    </div>
</body>
</html>