@extends('layouts.user_dashboard_layout')
@section('title')
    Advertisement
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Advertisement</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('find-job')}}">Home</a></li>
                <li class="breadcrumb-item active">Advertisement</li>
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
                          <h3 class="card-title">Advertisement</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        
                        <form action="{{route('save-ads')}}" enctype="multipart/form-data" method="POST">
                          @csrf
                          <div class="card-body">
                            <div class="form-group">
                                <label for="">Ads Title</label>
                                <input type="text"  name="ads_title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Target Destination</label>
                                <input type="text" name="target_destination" class="form-control">
                            </div>
                            <div class="ads-package">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="ads-package-container">
                                            <input type="radio" id="adsPackage1" name="ads_package" value="1" data-fee="1">
                                            <label class="ads-package-label d-flex justify-content-between" for="adsPackage1">
                                                <span class="font-weight-bold display-6"><i class="fas fa-ad"></i> 1 Day </span>
                                                <span class="right"> $1</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="ads-package-container">
                                            <input type="radio" id="adsPackage2" name="ads_package" value="2" data-fee="2">
                                            <label class="ads-package-label d-flex justify-content-between" for="adsPackage2">
                                                <span class="font-weight-bold display-6"><i class="fas fa-ad"></i> 2 Days </span>
                                                <span class="right"> $2</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="ads-package-container">
                                            <input type="radio" id="adsPackage3" name="ads_package" value="3" data-fee="3">
                                            <label class="ads-package-label d-flex justify-content-between" for="adsPackage3">
                                                <span class="font-weight-bold display-6"><i class="fas fa-ad"></i> 3 Days </span>
                                                <span class="right"> $3</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="ads-package-container">
                                            <input type="radio" id="adsPackage4" name="ads_package" value="4" data-fee="4">
                                            <label class="ads-package-label d-flex justify-content-between" for="adsPackage4">
                                                <span class="font-weight-bold display-6"><i class="fas fa-ad"></i> 4 Days </span>
                                                <span class="right"> $4</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="ads-package-container">
                                            <input type="radio" id="adsPackage5" name="ads_package" value="5" data-fee="5">
                                            <label class="ads-package-label d-flex justify-content-between" for="adsPackage5">
                                                <span class="font-weight-bold display-6"><i class="fas fa-ad"></i> 5 Days </span>
                                                <span class="right"> $5</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="ads-package-container">
                                            <input type="radio" id="adsPackage6" name="ads_package" value="6" data-fee="6">
                                            <label class="ads-package-label d-flex justify-content-between" for="adsPackage6">
                                                <span class="font-weight-bold display-6"><i class="fas fa-ad"></i> 6 Days </span>
                                                <span class="right"> $6</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="ads-package-container">
                                            <input type="radio" id="adsPackage7" name="ads_package" value="7" data-fee="7">
                                            <label class="ads-package-label d-flex justify-content-between" for="adsPackage7">
                                                <span class="font-weight-bold display-6"><i class="fas fa-ad"></i> 7 Days </span>
                                                <span class="right"> $7</span>
                                            </label>
                                        </div>
                                    </div>                     
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">*Image resolution max- width (1000px) & max- height (500px)</label>
                                <div class="input-group" >
                                  <div class="custom-file">
                                  <input type="file" class="custom-file-input"  name="banner_image" required id="exampleInputFileoption2">
                                  <label class="custom-file-label" for="exampleInputFileoption2">Select Banner Image</label>
                                  </div>
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