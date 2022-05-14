@extends('layouts.user_dashboard_layout')
@section('title')
    Edit Profile
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Edit Profile</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('find-job')}}">Home</a></li>
                <li class="breadcrumb-item active">Edit Profile</li>
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
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('upload-image', $user->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-4 text-center">
                                    <div style="text-align: center;"><img id="output" src="{{URL::to($user->profile_image)}}" class="rounded border-dark" style="margin-top: 10px;max-height: 200px;" width="150px" id="output"></div>
                                </div>
                                <br>
                                <div class="col-auto text-center">
                                    <div class="form-group">
                                        <div class="input-group" >
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="profile_image" name="profile_image" accept="image/x-png,image/jpg,image/jpeg" onchange="loadProfile(event)" >
                                                <label class="custom-file-label" for="profile_image"><i class="far fa-images"></i> Select New Image</label>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" id="profile_submit_button" value="Upload Image" class="d-none btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Profile</h4>
                        </div>
                        <div class="card-body">
                            <h6>Account Information</h6>
                            <form action="{{route('account-info', $user->id)}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Full Name</label>
                                            <input type="text" readonly  value="{{$user->name}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Email Address</label>
                                            <input type="text" readonly value="{{$user->email}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Age</label>
                                            <input type="text" name="age" value="{{$user->age}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Country</label>
                                            <input type="text" readonly value="{{optional($user->cnty)->sub_location_name}}" class="form-control">
                                        </div>
                                    </div>
                                    <hr>
                                    <h6>About Me</h6>
                                    <br>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">About Me</label>
                                            <textarea name="about_me" rows="3" class="form-control" placeholder="A few words about me">{{$user->about_me}}</textarea>
                                        </div>
                                    </div>
                                    <input type="submit" value="Update Information" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
      </section>
@endsection