@extends('backend.layouts.main')

@section('content') 
<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">        
        <div style="float:left;">
          <h1 class="m-0">{{$pageTitle}}</h1>
          </div>
          <div style="float:left;padding-left:20px;">
          <a href="{{ url('manageSlider') }}"><button type="button" class="btn btn-info">Manage Slider</button></a>
        </div>
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
          <form id="addSliderForm" action="submitSlider" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
            <div class="col-md-6">
                @if(session('error'))
                <div class="alert alert-danger">
                {{ session('error') }}
                </div>
                @endif
                <div class="form-group">
                  <label for="uname">First Title:</label>
                  <input type="text" class="form-control" id="firstTitle" placeholder="Enter title" name="firstTitle" value="{{ old('firstTitle') }}" >  
                  @error('firstTitle')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror     
                </div>
                <div class="form-group">
                  <label for="uname">Second Title:</label>
                  <input type="text" class="form-control" id="secondTitle" placeholder="Enter title" name="secondTitle" value="{{ old('secondTitle') }}">  
                  @error('secondTitle')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror     
                </div>
                <div class="form-group">
                  <label for="image">Image:</label>
                  <input type="file" class="form-control" id="image"  name="image" >     
                  @error('image')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror  
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
      