@extends('layouts.user_dashboard_layout')
@section('title')
    Post a Job
@endsection
<style>
    .tab-active{
        padding: 5px 10px;
        background: #4caf50;
        color: #fff;
        border: 1px solid #ddd;
    }
    .tab-general{
        padding: 5px 10px;
        color: #000;
        border: 1px solid #ddd;
    }
    .area-item-div{
      display: inline-block;
    }
    .area-item-div {
      margin: 10px 2px 10px 2px;
      display: inline-block;
    }
    .area-item {
      background-color: #fff;
      border-radius: 2px;
      border: 1px solid #eaeaea;
      padding: 1px 6px 1px 6px;
      outline: none;
      font-size: 14px;
      font-weight: bold;
      color: black;
    }
    .area-item-div input[type=radio]:checked+label {
      background-color: #22ab59;
      color: white;
      border-radius: 3px;
      outline: none;
      border: none;
    }
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
                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
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
                          <h3 class="card-title">bs-stepper</h3>
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
                                        <div class="btn-checkboxes btn-checkboxes--small-gutter row exclude-countries int" style="display: block;">
                                          <div class="col001">
                                              <div class="col022">
                                                  <input type="checkbox" id="ex-int-1" class="custom-control-input exclude-country" name="excludedCountries[]" value="al">
                                                  <label for="ex-int-1" class="exclude-country-label  bg-gray border-0">Albania</label>
                                              </div>
                                          </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" onclick="stepper1.next()">Next</button>
                                  </div>
                                  <div id="test-l-2" class="content">
                                    <p class="text-center">test 2</p>
                                    <button class="btn btn-primary" onclick="stepper1.previous()">Previous</button>
                                    <button class="btn btn-primary" onclick="stepper1.next()">Next</button>
                                    
                                  </div>
                                  <div id="test-l-3" class="content">
                                    <p class="text-center">test 3</p>
                                    <button class="btn btn-primary" onclick="stepper1.previous()">Previous</button>
                                    <button class="btn btn-primary" onclick="stepper1.next()">Next</button>
                                  </div>
                                  <div id="test-l-4" class="content">
                                    <p class="text-center">test 4</p>
                                    <button class="btn btn-primary" onclick="stepper1.previous()">Previous</button>
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                  </div>
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