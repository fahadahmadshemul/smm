@extends('layouts.dashboard_layout')
@section('title')
    Pending Withdraw
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Pending Withdraw</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                <li class="breadcrumb-item active">Pending Withdraw</li>
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
                    <table id="example" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Payment Method</th>
                                <th>Receive Account</th>
                                <th>Amount</th>
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
                                        {{optional($item->payment_method)->payment_name}}
                                    </td>
                                    <td>{{$item->receive_account}}</td>
                                    <td>$ @convert($item->amount)</td>
                                    <td>
                                        @if ($item->status == 0)
                                            <small><i class="fas fa-dot-circle text-info"></i></small> Pending
                                        @else
                                            <small><i class="fas fa-check text-success"></i></small> Complete
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('complete-withdraw', $item->id)}}" id="Approve" class="btn btn-success btn-sm"><i class="fas fa-check-circle"></i> Complete</a>
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                    <div >
                      <nav style="float: right;">{{$collection->links()}}</nav>
                    </div>
                </div>
              </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
@endsection