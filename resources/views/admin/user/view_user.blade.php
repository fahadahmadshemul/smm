@extends('layouts.dashboard_layout')
@section('title')
    View User
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">View User</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                <li class="breadcrumb-item active">View User</li>
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
              <div class="col-lg-12 col-12">
                <div class="card-header bg-primary">View User</div>
                <div class="card p-3">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" readonly value="{{$user->name}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" readonly value="{{$user->email}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="text" readonly value="{{$user->phone}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Country</label>
                                <input type="text" readonly value="{{optional($user->cnty)->sub_location_name}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Verify Card</label>
                                <input type="text" readonly value="{{$user->card_number}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for=""> Verify Card Type</label>
                                @if ($user->verify_card == 1)
                                    <input type="text" readonly value="National Id Card" class="form-control">
                                @elseif ($user->verify_card == 2)
                                    <input type="text" readonly value="Passport" class="form-control">
                                @elseif ($user->verify_card == 3)
                                    <input type="text" readonly value="Driving Licence" class="form-control">
                                @elseif ($user->verify_card == 4)
                                    <input type="text" readonly value="Birth Certificate" class="form-control">
                                @else
                                <input type="text" readonly value="" class="form-control">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for=""> Card Front Side</label>
                                <br>
                                <img src="{{URL::to($user->front_image)}}" style="max-height: 60px;" alt="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for=""> Card Back Side</label>
                                <br>
                                <img src="{{URL::to($user->back_image)}}" style="max-height: 60px;" alt="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Real Image with Card</label>
                                <br>
                                <img src="{{URL::to($user->real_image)}}" style="max-height: 60px;" alt="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Age</label>
                                <input type="text" readonly value="{{$user->age}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">About User</label>
                                <textarea readonly class="form-control">{{$user->about_me}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{route('make-user-verified', $user->id)}}" class="btn btn-primary">Make Verified User</a>
                        <a href="{{route('make-user-unverified', $user->id)}}" class="btn btn-danger">Make UnVerified User</a>
                    </div>
                </div>
              </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
@endsection