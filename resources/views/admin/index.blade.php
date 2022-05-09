@extends('layouts.dashboard_layout')
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
                          <h3>{{$job}}</h3>
                      <p>Active Jobs</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-briefcase"></i>
                      </div>
                      <a href="{{route('approved-job')}}" class="small-box-footer">
                      More info <i class="fas fa-arrow-circle-right"></i>
                      </a>
                  </div>
              </div>
              <div class="col-lg-3 col-6">
                <!-- small card -->
                  <div class="small-box shadow-lg bg-gradient-y-success text-light">
                      <div class="inner">
                          <h3>{{$p_jobs}}</h3>
                      <p>Pending Jobs</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-align-center"></i>
                      </div>
                      <a href="{{route('pending-job')}}" class="small-box-footer">
                      More info <i class="fas fa-arrow-circle-right"></i>
                      </a>
                  </div>
              </div>
              <div class="col-lg-3 col-6">
                <!-- small card -->
                  <div class="small-box shadow-lg bg-gradient-x2-pink text-light">
                      <div class="inner">
                          <h3>{{$c_jobs}}</h3>
                      <p>Complete Jobs</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-calendar-check"></i>
                      </div>
                      <a href="{{route('completed-job')}}" class="small-box-footer">
                      More info <i class="fas fa-arrow-circle-right"></i>
                      </a>
                  </div>
              </div>
              <div class="col-lg-3 col-6">
                <!-- small card -->
                  <div class="small-box shadow-lg bg-gradient-y2-cyan text-light">
                      <div class="inner">
                          <h3>{{$ps_jobs}}</h3>
                      <p>Pause Jobs</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-pause"></i>
                      </div>
                      <a href="{{route('paused-job')}}" class="small-box-footer">
                      More info <i class="fas fa-arrow-circle-right"></i>
                      </a>
                  </div>
              </div>
              <div class="col-lg-3 col-6">
                <!-- small card -->
                  <div class="small-box shadow-lg bg-gradient-directional-info text-light">
                      <div class="inner">
                          <h3>{{$c_ads}}</h3>
                      <p>Complete Ads</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-ad"></i>
                      </div>
                      <a href="{{route('all-advertisement')}}" class="small-box-footer">
                      More info <i class="fas fa-arrow-circle-right"></i>
                      </a>
                  </div>
              </div>
              <div class="col-lg-3 col-6">
                <!-- small card -->
                  <div class="small-box shadow-lg bg-gradient-y-blue text-light">
                      <div class="inner">
                          <h3>{{$p_ads}}</h3>
                      <p>Pending Ads</p>
                      </div>
                      <div class="icon">
                        <i class="fab fa-accusoft"></i>
                      </div>
                      <a href="{{route('pending-advertisement')}}" class="small-box-footer">
                      More info <i class="fas fa-arrow-circle-right"></i>
                      </a>
                  </div>
              </div>
              <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box shadow-lg bg-gradient-radial-warning text-light">
                    <div class="inner">
                        <h3>{{$pending_user}}</h3>
                    <p>Pending Users Verification</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-users"></i>
                    </div>
                    <a href="{{route('all-user')}}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
              </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
@endsection