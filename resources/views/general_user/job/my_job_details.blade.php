@extends('layouts.user_dashboard_layout')
@section('title')
    My Job Details
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">My Job Details</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('find-job')}}">Home</a></li>
                <li class="breadcrumb-item active">My Job Details</li>
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
              <div class="col-lg-8 col-12">
                <div class="row">
                    <div class="col-md-5">
                        <div class="card p-3">
                            <h4>ID: {{$content->job_id}}</h4>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-3">
                            <div class="text-left">
                                <p>Done</p>
                                <ul style="display: flex; justify-content: space-between; list-style: none;">
                                    <li><h4>{{$content->work_done}} of {{$content->worker_need}}</h4></li>
                                    <li><div><i class="i fas fa-check work-done"></i></div></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-3">
                            <h4>$ {{$content->total_spend}}</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card p-3">
                            <div class="card-header">
                                <h4>{{$content->job_title}}</h4>
                            </div>
                            <div class="card-body">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <span style="padding: 5px" class="card-text text-muted">
                                                <i class="fas fa-globe"></i> 
                                                @if (optional($content->location)->location_name)
                                                    {{optional($content->location)->location_name}}
                                                @else
                                                {{"International"}}    
                                                @endif
                                            </span>
                                        </div>
                                        <div class="col-sm-6">
                                            <span style="padding: 5px" class="card-text text-muted"><i class="fas fa-cogs"></i>
                                                {{optional($content->category)->category_name}} - {{optional($content->sub_category)->sub_category_name}}</span>
                                        </div>
                                    </div>
                
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <span style="padding: 5px" class="card-text text-muted">
                                                <i class="fas fa-globe"></i> Exclude Country - 
                                                @php
                                                    $sub_locations = explode('|', $content->sub_location_id);
                                                @endphp
                                                @if ($sub_locations != NULL)
                                                    @foreach ($sub_locations as $sub_location)
                                                        <span class="text-uppercase text-muted small">
                                                            @php
                                                                $sub_location = App\Models\SubLocation::where('id',$sub_location)->first();
                                                            @endphp
                                                            {{optional($sub_location)->sub_location_name}},
                                                        </span>
                                                    @endforeach
                                                    
                                                @endif
                                                
                                            </span>
                                        </div>
                                        <div class="col-sm-6">
                                            <span style="padding: 5px" class="card-text text-muted"> <i class="fas fa-calendar-day"></i> {{$content->created_at}}</span>
                                        </div>
                
                                        <div class="col-sm-6">
                                            <span style="padding: 5px" class="card-text text-muted"> <i class="fas fa-clock"></i> Time {{$content->estimated_day}}</span>
                                        </div>
                                        
                                        <div class="col-sm-6">
                                            <span style="padding: 5px" class="card-text text-muted">Last Updated- </span>
                                        </div>
                                    </div>
                
                                    <br>
                                    <br>
                                    <p class="card-text text-uppercase text-muted font-weight-600"><i class="fas fa-tasks"></i> Task Steps</p>
                                    @php
                                        $work_steps = $content->workSteps;
                                        $work_steps = explode('&#&', $work_steps);
                                        $i=1;
                                    @endphp
                                    @foreach ($work_steps as $work_step)
                                        <p class="card-text font-weight-500">{{$i}} {{$work_step}}</p>
                                        @php
                                            $i++;
                                        @endphp
                                    @endforeach
                                    
                                </div>
                            </div>
                
                            <!-- Prove Need -->
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="h3 mb-0 text-uppercase text-muted font-weight-600"> Required Proof</h5>
                                </div>
                                <div class="card-body">
                                    <p>
                                    <pre class="card-text font-weight-500">{{$content->task_proof}}</pre>
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <a href="" class="btn btn-info">Update</a>
                                    @if ($content->job_status == 1)
                                        <a href="{{route('pause-user-job', $content->id)}}" class="btn btn-primary">Pause</a>
                                    @else
                                        <a href="{{route('resume-user-job', $content->id)}}" class="btn btn-primary">Resume</a>
                                    @endif
                                </div>
                            </div>
                
                            </div>
                        </div>
                    </div>
                </div>
              </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
@endsection