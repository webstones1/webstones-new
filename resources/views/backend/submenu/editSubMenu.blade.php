@extends('backend.layouts.main')

@section('content') 
<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">{{$pageTitle}}</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">{{$pageTitle}}</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
<div class="container-fluid">
<form id="editSubMenuForm" action="{{url('/')}}/updateSubMenu" method="post">
        @csrf
<div class="row">
  <div class="col-md-6">
        @if(session('error'))
          <div class="alert alert-danger">
              {{ session('error') }}
          </div>
        @endif
        <div class="form-group">
            <label for="parentMenu">Select Menu:</label>
            <select class="form-control" id="parentMenu" name="parentMenu">
            <option value="">Select Menu</option>
            @foreach ($menus as $menu)
            <option value="{{ $menu->id }}" @if($menu->id == $submenu->menu_id) selected @endif >{{ $menu->title }}</option>
            <!-- Adjust the above line based on your actual database structure -->
            @endforeach
            </select>
            @error('parentMenu')
            <span class="text-danger">{{ $message }}</span>
            @enderror     
        </div>
        <div class="form-group">
        <label for="uname">Title:</label>
        <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="{{$submenu->title}}" >  
        @error('title')
            <span class="text-danger">{{ $message }}</span>
        @enderror     
        </div>
        <div class="form-group">
        <label for="uname">Link:</label>
        <input type="text" class="form-control" id="link" placeholder="Enter link" name="link" value="{{$submenu->link}}" >     
        @error('link')
            <span class="text-danger">{{ $message }}</span>
        @enderror  
        <input type="hidden" class="form-control" id="subMenuId"  name="subMenuId" value="{{$submenu->id}}" > 
        </div>
  </div>  
</div>  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<!-- /.container-fluid -->   
</section>
<!-- /.content -->   
@stop 
      