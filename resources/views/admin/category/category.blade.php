@extends('layouts.dashboard_layout')
@section('title')
    Category
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Category</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                <li class="breadcrumb-item active">Category</li>
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
                                            <th>Main Category Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $item)
                                            <tr>
                                                <td>{{$item->category_name}}</td>
                                                <td>
                                                    <a href="javascript:void(0)" id="main_category" data-toggle="modal" data-id="{{$item->id}}" data-target="#category_edit"  class="text-danger p-2"> <i class="fas fa-edit "></i></a>
                                                    <a href="{{route('delete-category', $item->id)}}" id="Delete" class="text-danger p-2"> <i class="fas fa-trash "></i></a>
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
                                    <h4>Add Category</h4>
                                </div>
                                <form action="{{route('save-category')}}" method="post">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="">Category Name</label>
                                            <input type="text" name="category_name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-danger"><i class="far fa-check-square"></i> Create Category</button>
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
                                         <th>Sub Category Name</th>
                                         <th>Main Category Name</th>
                                         <th>Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @foreach ($sub_categories as $item)
                                         <tr>
                                             <td>{{$item->sub_category_name}}</td>
                                             <td>{{optional($item->category)->category_name}}</td>
                                             <td>
                                                 <a href="javascript:void(0)" id="sub_category" data-toggle="modal" data-id="{{$item->id}}" data-target="#sub_category_edit"  class="text-danger p-2"> <i class="fas fa-edit "></i></a>
                                                 <a href="{{route('delete-sub-category', $item->id)}}" id="Delete" class="text-danger p-2"> <i class="fas fa-trash "></i></a>
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
                                 <h4>Add Sub Category</h4>
                             </div>
                             <form action="{{route('save-sub-category')}}" method="post">
                                 @csrf
                                 <div class="card-body">
                                     <div class="form-group">
                                         <label for="">Sub Category Name</label>
                                         <input type="text" name="sub_category_name" class="form-control">
                                     </div>
                                     <div class="form-group">
                                        <label for="">Main Category</label>
                                        <select name="main_category" id="" class="form-control">
                                            @foreach ($categories as $item)
                                                <option value="{{$item->id}}">{{$item->category_name}}</option>
                                            @endforeach
                                        </select>
                                     </div>
                                     <div class="form-group">
                                         <button class="btn btn-danger"><i class="far fa-check-square"></i> Create Sub Category</button>
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