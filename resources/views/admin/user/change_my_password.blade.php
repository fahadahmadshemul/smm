@extends('layouts.user_dashboard_layout')
@section('title')
    Change Password
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Change Password</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                <li class="breadcrumb-item active">Change Password</li>
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
              <div class="col-lg-6 col-12 mx-auto">
                <div class="card p-3">
                    <div class="card-header">
                        <h4>Change Password</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('update-my-password')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">New Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>
                            <input type="submit" class="btn btn-info" value="Change Password"/>
                        </form>
                    </div>
                </div>
              </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
@endsection