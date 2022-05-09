@extends('layouts.dashboard_layout')
@section('title')
    Pending Ads
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Pending Ads</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                <li class="breadcrumb-item active">Pending Ads</li>
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
                                <th>Ads Id</th>
                                <th>User</th>
                                <th>Ads Title</th>
                                <th>Start Time</th>
                                <th>End Time</th>
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
                                    <td>{{$item->ads_id}}</td>
                                    <td>{{optional($item->user)->name}}</td>
                                    <td>{{$item->ads_title}}</td>
                                    <td>{{$item->ad_start}}</td>
                                    <td>{{$item->ad_end}}</td>
                                    <td>
                                        <div class="btn-group dropleft">
                                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              Action
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{route('approve-ads', $item->id)}}"><small><i class="fas fa-play"></i></small> Approve</a>
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