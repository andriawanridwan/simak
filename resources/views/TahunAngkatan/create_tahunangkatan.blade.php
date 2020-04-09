@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Tambah Tahun Angkatan</h1>
</div>
<div class="card">
    <div class="card-body">
        <form action="{{ route('tahunangkatan.store') }}" method="post">
            @csrf


        </form>
    </div>
</div>
@endsection
