@extends('layouts.user_dashboard_layout')
@section('title')
    My Job
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">My Job</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                <li class="breadcrumb-item active">My Job</li>
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
                            @foreach ($collection->jobs as $item)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$item->job_id}}</td>
                                    <td>{{$item->job_title}}</td>
                                    <td>{{$item->work_done}} of {{$item->worker_need}}</td>
                                    <td>$ {{$item->total_spend}}</td>
                                    <td>
                                        @if ($item->status == 0)
                                            <small><i class="fas fa-dot-circle text-info"></i></small> Pending
                                        @elseif ($item->status == 1)
                                            <small><i class="fas fa-dot-circle text-success"></i></small> Active
                                        @elseif ($item->status == 2)
                                            <small><i class="fas fa-times text-danger"></i></small> Pause
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('job-proves', base64_encode($item->id))}}" class="btn btn-success btn-xs"><i class="fas fa-check-circle"></i> Proves</a>
                                        <a href="{{route('my-job-details', base64_encode($item->id))}}" class="btn btn-primary btn-xs"><i class="fas fa-eye"></i> Details</a>
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