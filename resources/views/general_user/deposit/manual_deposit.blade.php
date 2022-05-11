@extends('layouts.user_dashboard_layout')
@section('title')
    Deposit
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Deposit</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                <li class="breadcrumb-item active">Deposit</li>
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
                    <!-- general form elements -->
                    <div class="row">
                      @foreach ($payment_methods as $item)
                        <div class="col-md-4">
                          <div class="card card-primary shadow-lg bg-gradient-x-primary manual_deposit" data-toggle="modal" data-id="{{$item->id}}" data-target="#manual_deposit_modal{{$item->id}}">
                            <div class="card-body">
                              <div class="d-flex">
                                <img src="{{URL::to($item->payment_logo)}}" style="max-height: 80px" alt="">
                                <h3>{{$item->payment_name}}</h3>
                              </div>
                            </div>
                          </div>
                        </div>
                      @endforeach
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
      </section>
@endsection