@extends('layouts.user_dashboard_layout')
@section('title')
    Refer Now
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Refer Now</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('find-job')}}">Home</a></li>
                <li class="breadcrumb-item active">Refer Now</li>
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
                <div class="col-md-8 mx-auto">
                    <!-- general form elements -->
                    <div class="row">
                        <div class="col-md-7">
                            <div class="card card-primary">
                                  <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Your Affiliate Link</label>
                                        <div class="input-group mb-2">
                                            @php
                                                $id = base64_encode(Auth::user()->id);
                                                $url = URL::to('/');
                                                $link = $url.'/refer/'.$id;
                                            @endphp
                                            <input type="text" class="form-control" readonly id="account_three" value="{{$link}}">
                                            <div class="input-group-prepend">
                                              <div class="input-group-text copy-text"  style="background: #fff;" data-clipboard-target="#account_three"><i class="fas fa-copy"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-blue py-5 px-4 rounded">
                                        <p>{{$refer_count}} User joined by your reffer link.</p>
                                        <p style="margin-top: 10px" class="">Hello sir, you can now earn more by referring your friends. You will get 4% commission from your referral’s each completed task & 2% from your referral’s each deposit.</p>
                                    </div>
                                  </div>
                                  <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col">
                                            <h4 class="font-weight-bold mb-0 limited-offer__heading">Affiliate Program</h4>
                                        </div>
                                        <div class="col-auto">
                                            <span class="badge badge-lg badge-success drk_black_theme">Activated</span>
                                        </div>
                                    </div>
                                    <p style="padding: 5px;margin-top: 10px">Post your affiliate link on blogs, websites, forums, social media or write Workupjob review - Refer new members (Freelancers &amp; Business Owner) and earn commission revenue!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
      </section>
@endsection