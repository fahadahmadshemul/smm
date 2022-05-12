@extends('layouts.user_dashboard_layout')
@section('title')
    Account Verification
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Account Verification</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('find-job')}}">Home</a></li>
                <li class="breadcrumb-item active">Account Verification</li>
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
                    <div class="card card-primary">
                        @if($errors->any())
                              <div class="alert alert-danger">
                                  @foreach ($errors->all() as $error)
                                  <ul>
                                      <li> {{ $error }}</li>
                                  </ul>
                              @endforeach
                              </div>
                          @endif
                        <div class="card-header">
                          <h3 class="card-title">Account Verification</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        
                        <form action="{{route('verify.user')}}" enctype="multipart/form-data" method="POST">
                          @csrf
                          <div class="card-body">
                            <div class="form-group">
                                <label for="">Select Verify Card</label>
                                <select name="verify_card" id="verify_card" class="form-control">
                                    <option value="1">National Id Card</option>
                                    <option value="2">Passport</option>
                                    <option value="3">Driving Licence</option>
                                    <option value="4">Birth Certificate</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Full Name</label>
                                <input type="text" placeholder="Your Card Original Full Name" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Card Number</label>
                                <input type="text" placeholder="Card Number" name="card_number" class="form-control">
                            </div>
                            <div class="form-group text-center">
                                <img class="" style="max-height: 200px" id="nid" src="{{asset('/')}}public/billing/nid.jpg" alt="" >
                                <img class="d-none" style="max-height: 200px" id="passport" src="{{asset('/')}}public/billing/passport.jpg" alt="" >
                                <img class="d-none" style="max-height: 200px" id="driving_l" src="{{asset('/')}}public/billing/driver.jpg" alt="" >
                                <img class="d-none" style="max-height: 200px" id="birth_c" src="{{asset('/')}}public/billing/bio.jpg" alt="" >
                            </div>
                            <div class="form-group">
                                <label for="">Card Front Image</label>
                                <div class="input-group" >
                                  <div class="custom-file">
                                  <input type="file" class="custom-file-input"  name="front_image" id="exampleInputFileoption2">
                                  <label class="custom-file-label" for="exampleInputFileoption2">Select Card Front Image</label>
                                  </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Card Back Image</label>
                                <div class="input-group" >
                                  <div class="custom-file">
                                  <input type="file" class="custom-file-input"  name="back_image" id="exampleInputFileoption3">
                                  <label class="custom-file-label" for="exampleInputFileoption3">Select Card Back Image</label>
                                  </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Your Real Image with your Card</label>
                                <div class="input-group" >
                                  <div class="custom-file">
                                  <input type="file" class="custom-file-input"  name="real_image" id="exampleInputFileoption4">
                                  <label class="custom-file-label" for="exampleInputFileoption4">Select Your Real Image </label>
                                  </div>
                                </div>
                            </div>
                          </div>
                          <!-- /.card-body -->
          
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Verify</button>
                          </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
      </section>
@endsection