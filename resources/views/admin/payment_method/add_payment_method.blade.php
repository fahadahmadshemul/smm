@extends('layouts.dashboard_layout')
@section('title')
    Add Payment Method
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Add Payment Method</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                <li class="breadcrumb-item active">Add Payment Method</li>
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
                <div class="col-md-10 mx-auto">
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
                          <h3 class="card-title">Add Payment Method</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        
                        <form action="{{route('save-payment-method')}}" enctype="multipart/form-data" method="POST">
                          @csrf
                          <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Logo</label>
                                        <div class="input-group" >
                                          <div class="custom-file">
                                          <input type="file" class="custom-file-input"  name="payment_logo" id="exampleInputFileoption2">
                                          <label class="custom-file-label" for="exampleInputFileoption2">Upload Logo</label>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="payment_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Account Number One</label>
                                        <input type="text" name="account_no_one" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Account Number Two</label>
                                        <input type="text" name="account_no_two" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Account Number Three</label>
                                        <input type="text" name="account_no_three" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <select name="status" id="" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0">De-Active</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
      </section>
@endsection