@extends('layouts.user_dashboard_layout')
@section('title')
    Wallet
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Wallet</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                <li class="breadcrumb-item active">Wallet</li>
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
                          <h3 class="card-title">Wallet</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        
                        <form action="{{route('save-withdraw')}}" enctype="multipart/form-data" method="POST">
                          @csrf
                          <div class="card-body">
                            
                            <div class="form-group">
                                <label for="">Select Payment Method</label>
                                <div class="ads-package">
                                    <div class="row">
                                        @foreach ($payment_methods as $item)
                                            <div class="col-3">
                                                <div class="ads-package-container">
                                                    <input type="radio" id="adsPackage{{$item->id}}" name="payment_method_id"  value="{{$item->id}}" >
                                                    <label class="ads-package-label d-flex justify-content-between withdraw_payment_method" for="adsPackage{{$item->id}}">
                                                        <span class="font-weight-bold display-6">
                                                            <img src="{{URL::to($item->payment_logo)}}" style="max-height: 30px" alt="">
                                                        </span>
                                                        <span class="right"> {{$item->payment_name}} </span>
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-primary"><b>Minimum $3.5294(৳300) & Admin Fee 10%</b></h6>
                            <div class="form-group">
                                <label for="">Receive Account</label>
                                <input type="text" name="receive_account" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><small class="font-weight-bold">$</small></span>
                                            </div>
                                            <input class="form-control" name="amount" placeholder="Payment Amount" type="number" id="withdraw_amount" min="3.5294">
                                        </div>
                                        <div style="margin-top:8px;"></div>
                                        <small class="text-muted text-red font-weight-600" id="wallet-amount-info"></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-sm font-weight-bold text-uppercase" id="ddTotal">total</span>
                                            </div>
                                            <input class="form-control" placeholder="Payment Amount" type="text" id="total_withdraw" disabled>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-danger p-2 d-none" id="withdraw_message"><b>$1 = 85 | Payout 300.0000</b></p>
                            </div>
                          </div>
                          <!-- /.card-body -->
          
                          <div class="card-footer">
                            <button type="submit" id="withdraw_submit" class="btn btn-primary">Withdraw</button>
                          </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
      </section>
@endsection