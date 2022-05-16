@extends('layouts.user_dashboard_layout')
@section('title')
    My Job
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-4 text-center">
            @foreach ($ads as $ad)
              <div class="col-md-4">
                <div class="card">
                  <div class="">
                    <h6 class="pt-2"><a class="text-muted" href="{{route('ads')}}">Paid Ads</a></h6>
                    <hr>
                  </div>
                  <div class="card-body">
                    <a target="_blank" href="{{$ad->target_destination}}">
                      <img src="{{URL::to($ad->banner_image)}}" class="img-fluid" alt="" style="max-height: 100px">
                    </a>
                  </div>
                </div>
              </div>  
            @endforeach
            
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
                              @php
                                  $sub_location_id = $item->sub_location_id;
                                  $is_done = App\Models\WorkDone::where('job_id', $item->id)->where('user_id', \Auth::user()->id)->get()->count();
                              @endphp
                              @if ($item->worker_need > $item->work_done)
                                @if ($is_done == 0)
                                  @if ($sub_location_id != NULL)
                                  @php
                                      $sub_locations = explode('|', $sub_location_id)
                                  @endphp
                                  @if ($country_id = Auth::user()->country_id)
                                    @php
                                        $country_id = Auth::user()->country_id
                                    @endphp
                                    @if (!in_array($country_id, $sub_locations))
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
                                    @endif
                                  @endif
                                  @else
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
                                  @endif
                                @endif
                              @else
                              @endif
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