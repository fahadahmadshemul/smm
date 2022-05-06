@extends('layouts.dashboard_layout')
@section('title')
    Location
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Location</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                <li class="breadcrumb-item active">Location</li>
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
              <div class="col-lg-6 col-12">
                   <div class="row">
                        <div class="col-lg-12">
                            <div class="card p-3">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Main Location Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($locations as $item)
                                            <tr>
                                                <td>{{$item->location_name}}</td>
                                                <td>
                                                    <a href="javascript:void(0)" id="main_location" data-toggle="modal" data-id="{{$item->id}}" data-target="#location_edit"  class="text-danger p-2"> <i class="fas fa-edit "></i></a>
                                                    <a href="{{route('delete-location', $item->id)}}" id="Delete" class="text-danger p-2"> <i class="fas fa-trash "></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card p-3">
                                <div class="card-header">
                                    <h4>Add Location</h4>
                                </div>
                                <form action="{{route('save-location')}}" method="post">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="">Location Name</label>
                                            <input type="text" name="location_name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-danger"><i class="far fa-check-square"></i> Create Location</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                   </div>
              </div>
              <div class="col-lg-6 col-12">
                <div class="row">
                     <div class="col-lg-12">
                         <div class="card p-3">
                             <table class="table table-bordered table-striped">
                                 <thead>
                                     <tr>
                                         <th>Sub Location Name</th>
                                         <th>Main Location Name</th>
                                         <th>Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @foreach ($sub_locations as $item)
                                         <tr>
                                             <td>{{$item->sub_location_name}}</td>
                                             <td>{{optional($item->location)->location_name}}</td>
                                             <td>
                                                 <a href="javascript:void(0)" id="sub_location" data-toggle="modal" data-id="{{$item->id}}" data-target="#sub_location_edit"  class="text-danger p-2"> <i class="fas fa-edit "></i></a>
                                                 <a href="{{route('delete-sub-location', $item->id)}}" id="Delete" class="text-danger p-2"> <i class="fas fa-trash "></i></a>
                                             </td>
                                         </tr>
                                     @endforeach
                                     
                                 </tbody>
                             </table>
                         </div>
                     </div>
                     <div class="col-lg-12">
                         <div class="card p-3">
                             <div class="card-header">
                                 <h4>Add Sub Location</h4>
                             </div>
                             <form action="{{route('save-sub-location')}}" method="post">
                                 @csrf
                                 <div class="card-body">
                                     <div class="form-group">
                                         <label for="">Sub Location Name</label>
                                         <input type="text" name="sub_location_name" class="form-control">
                                     </div>
                                     <div class="form-group">
                                        <label for="">Main Location</label>
                                        <select name="main_location" id="" class="form-control">
                                            @foreach ($locations as $item)
                                                <option value="{{$item->id}}">{{$item->location_name}}</option>
                                            @endforeach
                                        </select>
                                     </div>
                                     <div class="form-group">
                                         <button class="btn btn-danger"><i class="far fa-check-square"></i> Create Sub Location</button>
                                     </div>
                                 </div>
                             </form>
                         </div>
                     </div>
                </div>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
@endsection