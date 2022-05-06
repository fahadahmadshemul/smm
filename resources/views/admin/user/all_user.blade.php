@extends('layouts.dashboard_layout')
@section('title')
    All User
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">All User</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                <li class="breadcrumb-item active">All User</li>
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Country</th>
                                <th>Status</th>
                                <th>Verify</th>
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
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>{{optional($item->country)->sub_location_name}}</td>
                                    <td>
                                        @if ($item->status == 1)
                                        <small><i class="fas fa-dot-circle text-success"></i></small> Active
                                        @else
                                        <small><i class="fas fa-dot-circle text-danger"></i></small> Block
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->is_verified == 1)
                                        <small><i class="fas fa-dot-circle text-success"></i></small> Verified
                                        @else
                                        <small><i class="fas fa-dot-circle text-danger"></i></small> Unverified
                                        @endif
                                    </td>
                                    
                                    <td>
                                        <div class="btn-group dropleft">
                                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              Action
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{route('change-user-password', $item->id)}}"><small><i class="fas fa-edit"></i></small> Change Password</a>
                                                <hr>
                                                <a class="dropdown-item" href="{{route('active-user', $item->id)}}"><small><i class="fas fa-play"></i></small> Active</a>
                                                <a class="dropdown-item" href="{{route('block-user', $item->id)}}"><small><i class="fas fa-pause"></i> </small> Block</a>
                                            </div>
                                          </div>
                                    </td>
                                </tr>
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