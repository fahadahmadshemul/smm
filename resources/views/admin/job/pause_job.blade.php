@extends('layouts.dashboard_layout')
@section('title')
    Pause Jobs
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Pause Jobs</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                <li class="breadcrumb-item active">Pause Jobs</li>
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
                                <th>Job Id</th>
                                <th>Job Name</th>
                                <th>Progress</th>
                                <th>Cost</th>
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
                                    <td>{{$item->job_id}}</td>
                                    <td>{{$item->job_title}}</td>
                                    <td></td>
                                    <td>{{$item->total_spend}}</td>
                                    <td>
                                        @if($item->job_status == 2)
                                            <small><i class="fas fa-dot-circle text-warning"></i></small> Pause
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group dropleft">
                                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              Action
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{route('approve-job', $item->id)}}"><small><i class="fas fa-play"></i></small> Approve</a>
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