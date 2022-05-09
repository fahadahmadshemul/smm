@extends('layouts.dashboard_layout')
@section('title')
    Notice
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Notice</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                <li class="breadcrumb-item active">Notice</li>
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
                          <h3 class="card-title">Notice</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        
                        <form action="{{route('update-notice')}}" enctype="multipart/form-data" method="POST">
                          @csrf
                          <div class="card-body">
                            <div class="form-group">
                                <label for="">Notice</label>
                                <textarea name="description" id="summernote" cols="30" rows="10">{!!$notice->description!!}</textarea>
                            </div>
                          </div>
                          <!-- /.card-body -->
          
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                          </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
      </section>
@endsection