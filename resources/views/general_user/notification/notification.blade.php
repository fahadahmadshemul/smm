@extends('layouts.user_dashboard_layout')
@section('title')
    Notification
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Notification</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{route('find-job')}}">Home</a></li>
                  <li class="breadcrumb-item active">Notification</li>
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
                        <div class="timeline">
                            @foreach ($collection as $item)
                                <!-- timeline item -->
                                <div>
                                    <i class="fas fa-bell bg-green"></i>
                                    <div class="timeline-item">
                                    <span class="time"><i class="fas fa-clock"></i> {{$item->created_at}}</span>
                                    <h3 class="timeline-header text-muted">{{$item->title}}</h3>
                                    <div class="timeline-body">
                                        {{$item->description}}
                                    </div>
                                    </div>
                                </div>
                                <!-- END timeline item -->
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