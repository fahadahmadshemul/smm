@extends('layouts.user_dashboard_layout')
@section('title')
    Post a Job
@endsection
<style>
    
</style>
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Post a Job</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('find-job')}}">Home</a></li>
                <li class="breadcrumb-item active">Post a Job</li>
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
                <div class="col-md-12 mx-auto">
                    <div class="card card-default">
                        <div class="card-header">
                          <h3 class="card-title">Post a Job</h3>
                          @if($errors->any())
                              <div class="alert alert-danger">
                                  @foreach ($errors->all() as $error)
                                  <ul>
                                      <li> {{ $error }}</li>
                                  </ul>
                              @endforeach
                              </div>
                          @endif
                        </div>
                        <div class="card-body">
                            <div id="stepper1" class="bs-stepper">
                                <div class="bs-stepper-header">
                                  <div class="step" data-target="#test-l-1">
                                    <button type="button" class="btn step-trigger">
                                      <span class="bs-stepper-circle">1</span>
                                      <span class="bs-stepper-label">Select Location</span>
                                    </button>
                                  </div>
                                  <div class="line"></div>
                                  <div class="step" data-target="#test-l-2">
                                    <button type="button" class="btn step-trigger">
                                      <span class="bs-stepper-circle">2</span>
                                      <span class="bs-stepper-label">Select Category</span>
                                    </button>
                                  </div>
                                  <div class="line"></div>
                                  <div class="step" data-target="#test-l-3">
                                    <button type="button" class="btn step-trigger">
                                      <span class="bs-stepper-circle">3</span>
                                      <span class="bs-stepper-label">Job Information</span>
                                    </button>
                                  </div>
                                  <div class="line"></div>
                                  <div class="step" data-target="#test-l-4">
                                    <button type="button" class="btn step-trigger">
                                      <span class="bs-stepper-circle">4</span>
                                      <span class="bs-stepper-label">Budget And Setting</span>
                                    </button>
                                  </div>
                                </div>
                                <div class="bs-stepper-content">
                                  <form action="{{route('save-post-job')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div id="test-l-1" class="content">
                                      <div class="area-list">
                                        <div class="area-item-div">
                                          <input type="radio" name="location" id="location" class="d-none get_sub_location" data-id="international" value="international" >
                                          <label for="location" class="area-item">International</label>
                                        </div>
                                        @foreach ($locations as $location)
                                          <div class="area-item-div">
                                            <input type="radio" name="location" id="location{{$location->id}}" class="d-none get_sub_location" data-id="{{$location->id}}" value="{{$location->id}}">
                                            <label for="location{{$location->id}}" class="area-item">{{$location->location_name}}</label>
                                          </div>
                                        @endforeach
                                      </div>
                                      <div class="form-group">
                                        <label class="text-sm font-weight-medium text-red mb-3" style="border: 2px solid #FF7800 !important;padding: 4px;border-radius: 5px;margin-top: 16px;">Select countries you want to hide from the selected zone <span class="text-green">(optional)</span></label>
                                        <div class="sub-area-list" id="sub-area-list">
                                          @foreach ($sub_locations as $item)
                                            <div class="sub-area-item-div">
                                              <input type="checkbox" name="sub_location[]" id="sub_location{{$item->id}}" class="d-none"  value="{{$item->id}}" >
                                              <label for="sub_location{{$item->id}}" class="sub-area-item">{{$item->sub_location_name}}</label>
                                            </div>
                                          @endforeach
                                        </div>
                                      </div>
                                      <a href="javascript::void(0)" onclick="stepper1.next()" class="btn btn-success">Next</a>
                                    </div>
                                    <div id="test-l-2" class="content">
                                      <div class="category-list">
                                        @foreach ($categories as $item)
                                          <div class="category-item-div">
                                            <input type="radio" name="category" id="category{{$item->id}}" class="d-none get_sub_category" data-id="{{$item->id}}" value="{{$item->id}}">
                                            <label for="category{{$item->id}}" class="category-item">{{$item->category_name}}</label>
                                          </div>
                                        @endforeach
                                      </div>
                                      <hr style="background:red; height:3px;" >
                                      <div class="form-group">
                                        <h4 class="text-success">Select Sub Category</h4>
                                        <div class="sub-category-list" id="sub-category-list">
                                          @foreach ($sub_categories as $item)
                                            <div class="sub-category-item-div">
                                              <input type="radio" name="sub_category" id="sub_category{{$item->id}}" class="d-none"  value="{{$item->id}}" >
                                              <label for="sub_category{{$item->id}}" class="sub-category-item">{{$item->sub_category_name}}</label>
                                            </div>
                                          @endforeach
                                        </div>
                                      </div>
                                      <a href="javascript:void(0)" onclick="stepper1.previous()" class="btn btn-primary">Previous</a>
                                      <a href="javascript:void(0)" onclick="stepper1.next()" class="btn btn-success">Next</a>
                                      
                                    </div>
                                    <div id="test-l-3" class="content">
                                      <div class="form-group">
                                        <label for="">Write an accurate job Title</label>
                                        <input type="text" name="job_title" required  class="form-control">
                                      </div>
                                      <div class="form-group">
                                        <label style="color:#0f7235">What specific tasks need to be Completed</label>
                                        <div class="post-job-require-steps required-work-steps">
                                            <div class="post-job-work-step">
                                                <div class="text-label-join mb-3 bg-softer pwjs">
                                                    <label for="">Step <span class="stepid">1</span></label>
                                                    <textarea name="workSteps[]"  class="form-control" rows="2"></textarea>
                                                </div>
                                            </div>
                                            <button class="btn btn-icon btn-facebook add-new-works-step" type="button">
                                                <!--<span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>-->
                                                <span class="btn btn-success">Add Step</span>
                                            </button>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label for="">Required proof the job was Completed</label>
                                        <textarea name="task_proof" id=""  rows="3" class="form-control"></textarea>
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleInputFileoption3">Thumbnail Image</label>
                                        <div class="input-group" >
                                          <div class="custom-file">
                                          <input type="file" class="custom-file-input"  name="thumbnail_image" id="exampleInputFileoption3">
                                          <label class="custom-file-label" for="exampleInputFileoption3">Select Image</label>
                                          </div>
                                        </div>
                                      </div>
                                      
                                      <a href="javascript::void(0)" onclick="stepper1.previous()" class="btn btn-primary">Previous</a>
                                      <a href="javascript::void(0)" onclick="stepper1.next()" class="btn btn-success">Next</a>
                                    </div>
                                    <div id="test-l-4" class="content">
                                      <p  id="spend1" class="font-weight-bold text-red spend1 ml-3"><i class="fas fa-exclamation-triangle"></i>-please Increase your worker!<p>
                                      <div class="row">
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label for="">Worker Need</label>
                                            <input type="number" name="worker_need" id="worker_need" value="5" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label for="">Each Worker Earn</label>
                                            <input type="text" value="0.025" name="each_worker_earn" id="each_worker_earn" required class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label for="">Require Screenshots</label>
                                            <input type="number" name="require_screenshot" id="require_screenshot" value="0" class="form-control">
                                          </div>
                                          <div class="form-group">
                                            <label for="">Estimated Day</label>
                                            <input type="number" name="estimated_day" value="1" class="form-control">
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="card">
                                            <div class="card-header">
                                              <p class="text-center">Estimated Job Cost</p>
                                            </div>
                                            <div class="card-body">
                                              <div class="form-group">
                                                <div class="input-group mb-2">
                                                  <div class="input-group-prepend">
                                                    <div class="input-group-text bg-white">$</div>
                                                  </div>
                                                  <input type="text" name="total_spend" readonly class="form-control" style="background: #fce3e5" id="total_spend" value="0.131">
                                                </div>
                                                <p class="text-center text-danger">Minimum spend $0.80 </p>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <a href="javascript::void(0)" onclick="stepper1.previous()" class="btn btn-primary">Previous</a>
                                      <button class="btn btn-success" id="post_job_submit_button" type="submit">Submit</button>
                                    </div>
                                  </form>
                                </div>
                            </div>
                        </div>
                      </div>
                      <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
      </section>
@endsection