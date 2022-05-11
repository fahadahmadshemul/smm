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
                    <div class="card-body">
                        <div id="loadData">
                            {{ csrf_field() }}
                            @foreach ($collection as $item)
                                <a href="{{route('job', base64_encode($item->id))}}">
                                    <div class="callout callout-info" style="padding:10px !important">
                                        <h5>{{$item->job_title}}</h5>
                                        <div class="row" style="padding:1px;">
                                            <div class="col"></div>
                                            <div class="col">
                                                <b>
                                                    <h6>{{$item->work_done}} of {{$item->worker_need}}</h6>
                                                    @php
                                                        $percent = ($item->work_done*100)/$item->worker_need;
                                                    @endphp
                                                </b>
                                                <div class="progress progress-xs mb-0" style="width: 100%;margin-top: 3px">
                                                    <div class="progress-bar bg-csgreen" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: {{$percent}}%;"></div>
                                                </div>
                                            </div>
                                            <div class="col text-center" style="color:#1D8348">
                                                $ <b>{{$item->each_worker_earn}}</b>
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        <div >
                            <nav style="float: right;">{{$collection->links()}}</nav>
                        </div>
                    </div>
                </div>
              </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
@endsection