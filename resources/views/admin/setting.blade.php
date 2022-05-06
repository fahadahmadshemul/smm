@extends('layouts.dashboard_layout')
@section('title')
    Setting
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Setting</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                <li class="breadcrumb-item active">Setting</li>
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
              <div class="col-lg-10 col-12 mx-auto">
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
                      <h3 class="card-title">Setting</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    
                    <form action="{{route('setting.update')}}" enctype="multipart/form-data" method="POST">
                      @csrf
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Logo</label>
                              @if ($setting->logo != NULL)
                                <br>
                                <img src="{{URL::to($setting->logo)}}" alt="" style="max-height: 80px">
                                <br>
                                <br>
                              @endif
                              <div class="input-group" >
                                <div class="custom-file">
                                <input type="file" class="custom-file-input"  name="logo" id="exampleInputFileoption2">
                                <label class="custom-file-label" for="exampleInputFileoption2">Upload Logo</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Favicon</label>
                              @if ($setting->favicon != NULL)
                                <br>
                                <img src="{{URL::to($setting->favicon)}}" alt="" style="max-height: 80px">
                                <br>
                                <br>
                              @endif
                              <div class="input-group" >
                                <div class="custom-file">
                                <input type="file" class="custom-file-input"  name="favicon" id="exampleInputFileoption3">
                                <label class="custom-file-label" for="exampleInputFileoption3">Upload Favicon</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="">Website Title</label>
                              <input type="text" value="{{$setting->website_title}}" name="website_title" class="form-control">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="">Website Description</label>
                              <textarea name="website_desc"  rows="4" class="form-control">{{$setting->website_desc}}</textarea>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="">Meta Title</label>
                              <input type="text" name="meta_title" value="{{$setting->meta_title}}" class="form-control">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="">Meta Description</label>
                              <textarea name="meta_desc"  rows="4" class="form-control">{{$setting->meta_desc}}</textarea>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Facebook Link</label>
                              <input type="text" name="facebook" value="{{$setting->facebook}}" class="form-control">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Youtube Link</label>
                              <input type="text" name="youtube" value="{{$setting->youtube}}" class="form-control">
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.card-body -->
      
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                      </div>
                    </form>
                </div>
              </div>
              <div class="col-lg-6 col-12">
                
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
@endsection