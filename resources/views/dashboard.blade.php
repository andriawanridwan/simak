@extends('layouts.master')

@section('content')
    <div class="section-header">
            <h1>Dashboard</h1>
         </div>
          <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>User</h4>
                  </div>
                  <div class="card-body">
                    {{$user}}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Mahasiswa</h4>
                  </div>
                  <div class="card-body">
                    {{$mahasiswa}}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                 <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Dosen</h4>
                  </div>
                  <div class="card-body">
                    {{$dosen}}
                  </div>
                </div>
              </div>
            </div>
           
@endsection