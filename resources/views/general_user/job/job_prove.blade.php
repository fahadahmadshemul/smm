@extends('layouts.user_dashboard_layout')
@section('title')
    Job Proves
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Job Proves</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('find-job')}}">Home</a></li>
                <li class="breadcrumb-item active">Job Proves</li>
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
                    <div class="card-header">
                        <h4>{{$job->job_title}}</h4>
                        <a href="{{route('satisfy-all', $job->id)}}" id="SatisfyAll" class="btn btn-success">Satisfy All</a>
                    </div>
                    <div class="card-body">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Action</th>
                            <th>Work Name</th>
                            <th>User Name</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($job->proves as $item)
                              <tr>
                                <td>
                                  @if ($item->status == 1)
                                    <a href="" class="btn btn-info">Satisfied</a>
                                  @else
                                    <a href="" class="btn btn-success">Satisfy</a>
                                  @endif
                                </td>
                                <td>
                                  <strong>{{$item->work_proof}}</strong>
                                  <br>
                                  <span>{{$item->created_at}}</span>
                                </td>
                                <td>
                                  @php
                                      $user = \App\Models\User::where('id', $item->worker_id)->first();
                                  @endphp
                                  @if ($user)
                                    {{optional($user)->name}}
                                  @endif
                                </td>
                              </tr>
                          @endforeach
                          
                        </tbody>
                      </table>
                    </div>
                </div>
              </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
@endsection