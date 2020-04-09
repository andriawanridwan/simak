@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Tambah Dosen</h1>
</div>
<div class="card">
    <div class="card-body">
        <form action="{{ route('dosen.store') }}" method="post">
            @csrf


        </form>
    </div>
</div>
@endsection
