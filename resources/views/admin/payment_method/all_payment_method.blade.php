@extends('layouts.dashboard_layout')
@section('title')
    Payment Methods
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Payment Methods</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                <li class="breadcrumb-item active">Payment Methods</li>
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
                <div class="card p-3">
                    <h4><a href="{{route('add-payment-method')}}" class="btn btn-info btn-sm"> <i class="fas fa-plus-circle"></i> Add New</a></h4>
                    <table id="example" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Logo</th>
                                <th>Name</th>
                                <th>Account No 1</th>
                                <th>Account No 2</th>
                                <th>Account No 3</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach ($collection as $item)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>
                                        <img style="max-height: 60px" src="{{URL::to($item->payment_logo)}}" alt="">
                                    </td>
                                    <td>{{$item->payment_name}}</td>
                                    <td>{{$item->account_no_one}}</td>
                                    <td>{{$item->account_no_two}}</td>
                                    <td>{{$item->account_no_three}}</td>
                                    <td>
                                      @if ($item->status == 0)
                                        <small><i class="fas fa-dot-circle text-info"></i></small> De-Active
                                      @else
                                        <small><i class="fas fa-dot-circle text-success"></i></small> Active
                                      @endif
                                    </td>
                                    <td>
                                      <a href="{{route('edit-payment-method', $item->id)}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                      <a href="{{route('delete-payment-method', $item->id)}}" id="Delete" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
              </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
@endsection