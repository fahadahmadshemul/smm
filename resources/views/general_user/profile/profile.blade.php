@extends('layouts.user_dashboard_layout')
@section('title')
    Profile
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Profile</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('find-job')}}">Home</a></li>
                <li class="breadcrumb-item active">Profile</li>
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
                <div class="col-md-11 mx-auto">
                    <div class="row">
                        <div class="col-xl-4 order-xl-2">
                            <div class="card card-Profile">
                                <img src="https://workupjob.com/assets/img/brand/10000-0.jpg" alt="Image placeholder" class="card-img-top">
                                <div class="row justify-content-center">
                                    <a href="#">
                                        <img src="{{URL::to($user->profile_image)}}" class="rounded-circle" style="width:120px;height:120px">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <h5>{{$user->name}} <small><em class="text-success">I'm  online</em></small></h5>
                                        @php
                                            $review_count = App\Models\Review::where('user_id', $user->id)->get()->count();
                                            $avg_review_rate = App\Models\Review::where('user_id', $user->id)->avg('rate');
                                        @endphp
                                        <p>
                                            @if ($review_count)
                                                {{$review_count}}
                                            @else
                                            {{'0'}}
                                            @endif Reviews (@if ($avg_review_rate)
                                                {{number_format($avg_review_rate, 0)}} @else {{'0'}} <span><i style="font-weight: normal; color: #f7bc0b; font-size: 14px;" class="fas fa-star"></i></span>
                                            @endif)</p>
                                        <b>Since</b> {{date('d-M-Y', strtotime(optional($user)->created_at))}}
                                        <p><i class="fas fa-map-marker"></i> {{optional($user->cnty)->sub_location_name}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 order-xl-1">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="text-muted">Overview</h6>
                                    <h4>Total Working</h4>
                                </div>
                                <div class="card-body cust_task_working">
                                    <div class="row mb-2">
                                        <div class="col-6">Task Attend</div>
                                        <div class="col-6 text-primary">{{$attend}}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">Satisfied <br> <small>Approved in task</small></div>
                                        <div class="col-6 text-success">{{$satisfy}}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">Not Satisfied <br> <small>Rejected in task prove</small></div>
                                        <div class="col-6 text-danger">{{$unsatisfy}}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">Pending<br> <small>In review for rating</small></div>
                                        <div class="col-6 text-info">{{$pending}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="text-muted">Overview</h6>
                                    <h4>Total Job</h4>
                                </div>
                                <div class="text-success">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-6">Jobs Posted</div>
                                            <div class="col-6">
                                                @if ($total_job_post != NULL)
                                                {{$total_job_post->total_job_post}}
                                            @endif</div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6">Total Deposit</div>
                                            <div class="col-6">$ @if ($user->total_deposit)
                                                {{$user->total_deposit}}
                                            @endif</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
      </section>
@endsection