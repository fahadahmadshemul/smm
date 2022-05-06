@extends('layouts.user_dashboard_layout')
@section('title')
    Dashboard
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
              <div class="col-lg-3 col-6">
                    <!-- small card -->
                  <div class="small-box shadow-lg bg-gradient-x-primary text-light">
                      <div class="inner">
                          <h3>1</h3>
                      <p>Active Jobs</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-briefcase"></i>
                      </div>
                      <a href="" class="small-box-footer">
                      More info <i class="fas fa-arrow-circle-right"></i>
                      </a>
                  </div>
              </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
@endsection