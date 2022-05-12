@extends('layouts.user_dashboard_layout')
@section('title')
    Job
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Job</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('find-job')}}">Home</a></li>
                <li class="breadcrumb-item active">Job</li>
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
              <div class="col-md-8">
                <div class="row">
                    <div class="col-md-7">
                        <div class="card p-3">
                            <div class="text-left">
                                <p>Done</p>
                                <ul style="display: flex; justify-content: space-between; list-style: none;">
                                    <li>
                                        <h4>{{$content->work_done}} of {{$content->worker_need}}</h4>
                                        @php
                                            $percent = ($content->work_done*100)/$content->worker_need;
                                        @endphp
                                        <div class="progress progress-xs mb-0" style="width: 100%;margin-top: 3px">
                                            <div class="progress-bar bg-csgreen" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: {{$percent}}%;"></div>
                                        </div>
                                    </li>
                                    <li><div><i class="i fas fa-check work-done"></i></div></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card p-3">
                            <h2>You Can Earn</h2>
                            <h4 class="text-center text-success">$ {{$content->each_worker_earn}}</h4>
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
                                <div class="text-center">
                                    <img class="img-fluid" src="{{URL::to($content->thumbnail_image)}}" style="max-height: 400px;margin-bottom:10px" alt="">
                                </div>
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
                                <p class="card-text text-uppercase text-muted font-weight-600"><i class="fas fa-tasks"></i>  What is expected from workers?</p>
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
                
                                <!-- Prove Need -->
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class=" mb-0 text-uppercase text-muted font-weight-600"> REQUIRED PROOF THAT TASK WAS FINISHED?</h5>
                                    </div>
                                    <div class="card-body">
                                        <p>
                                        <pre class="card-text font-weight-500">{{$content->task_proof}}</pre>
                                        </p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="{{route('save-work', $content->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="h4 mb-0 text-uppercase text-muted font-weight-900">Submit required work
                                        Prove  <i class="fas fa-sort-alpha-down"></i></h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <textarea name="work_proof" class="form-control drk-bg-second" id="exampleFormControlTextarea1" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 100px;"></textarea>
                                    </div>
                                </div>
                            </div>
                            @for ($i = 1; $i <= $content->require_screenshot; $i++)
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="h5 mb-0 text-uppercase text-muted font-weight-900"><span
                                                class="badge badge-dark text-white"># <?php echo $i ?></span> Upload Screenshot Prove  <i class="fas fa-file-download"></i></h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="custom-file">
                                            @php
                                                $id = 'output'.$i;
                                            @endphp
                                            <input type="file" class="custom-file-input"  name="screenshoot[]" accept="image/x-png,image/jpg,image/jpeg" onchange="loadFile(event, {{$id}})" required>
                                            <label class="custom-file-label" for="sshotUpload1"><i class="far fa-images"></i></label>
                                        </div>
                                        <div style="text-align: center;"><img class="rounded border-dark" style="margin-top: 10px;max-height: 200px;" width="150px" id="output{{$i}}"></div>
                                    </div>
                                </div>
                            @endfor
                            <div class="text-right mb-4">
                                <button type="submit" class="btn btn-success"><i class="fas fa-check-circle"></i> Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
              <div class="col-md-4">
                <!-- Profile Image -->
                  <div class="card card-primary card-outline">
                      <div class="card-body box-profile">
                      <div class="text-center">
                          <img class="profile-user-img img-fluid img-circle"
                              src="{{URL::to($content->user->real_image)}}"
                              alt="User profile picture">
                      <a href=""><p><strong>{{$content->user->name}}</strong> <em class="text-success">i am in online</em></p></a>
                      </div>
                      
                      <ul class="list-group list-group-unbordered mb-3">
                          <li class="list-group-item text-center">
                          <b>Since</b> {{date('d-M-Y', strtotime($content->user->created_at))}}
                          </li>
                      </ul>
                      </div>
                      <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
              </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
@endsection