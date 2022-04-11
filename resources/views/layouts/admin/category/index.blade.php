@extends('layouts.app')
@section('title') 
Category
@endsection
@section('main-content')


    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>    
        <strong>{{ $message }}</strong>
    </div>
    @endif
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
         <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
             
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Category List</h3>
                <a href="{{route('categories.create')}}" class="btn btn-primary float-right"> +Add Category</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SN#</th>
                    <th>Name</th>
                    <th width="10%">Action</th>
                   
                  </tr>
                  </thead>
                    <tbody>
                        @foreach ($categories as $key => $category)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$category->name}}</td>
                            <td>
                                <a href="{{route('categories.edit',$category->id)}}" class="btn btn-sm btn-primary"><span class="fa fa-edit"></span></a>
                                <a href="javascript:;" class="btn btn-sm btn-danger sa-delete" data-form-id="category-delete-{{$category->id}}">
                                    <span class="fa fa-trash"></span>
                                </a>
                                <form id="category-delete-{{$category->id}}" action="{{ route('categories.destroy', $category->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr> 
                        @endforeach
                       
                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
    </section>
@endsection
