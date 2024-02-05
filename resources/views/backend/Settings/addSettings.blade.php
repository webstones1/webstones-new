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
          <a href="{{ url('manageExcellenceAndExpertise') }}"><button type="button" class="btn btn-info">Manage</button></a>
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
          <form id="addSettingForm" action="submitaddSettingForm" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    @if(session('error'))
                    <div class="alert alert-danger">
                    {{ session('error') }}
                    </div>
                    @endif
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                        <label for="uname">Tag Line:</label>
                        <input type="text" class="form-control" id="logoTagLine" placeholder="Enter title" name="logoTagLine" value="{{ old('logoTagLine') }}" >  
                        @error('logoTagLine')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror     
                        </div>
                      </div>                     
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                        <label for="uname">Logo Link:</label>
                        <input type="text" class="form-control" id="logoLink" placeholder="Enter title" name="logoLink" value="{{ old('logoLink') }}" >  
                        @error('logoLink')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror     
                        </div>
                      </div>                     
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                        <label for="uname">Copy Right Text:</label>
                        <input type="text" class="form-control" id="copyRightText" placeholder="Enter title" name="copyRightText" value="{{ old('copyRightText') }}" >  
                        @error('copyRightText')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror     
                        </div>
                      </div>                     
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                        <label for="uname">Site Description:</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Enter Description" rows="4" cols="50">{{ old('description') }}</textarea>                  
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror     
                        </div>
                      </div>
                    </div> 
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                        <label for="uname">Contact Info:</label>
                        <input type="text" class="form-control" id="contactInfo" placeholder="Enter title" name="contactInfo" value="{{ old('contactInfo') }}" >  
                        @error('contactInfo')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror     
                        </div>
                      </div>                     
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                        <label for="uname">Email Id:</label>
                        <input type="text" class="form-control" id="emailId" placeholder="Enter title" name="emailId" value="{{ old('emailId') }}" >  
                        @error('emailId')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror     
                        </div>
                      </div>                     
                    </div>
                    
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                        <label for="uname">Facebook:</label>
                        <input type="text" class="form-control" id="facebookInfo" placeholder="Enter facebook link" name="facebookInfo" value="{{ old('facebookInfo') }}" >  
                        @error('facebookInfo')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror     
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                        <label for="uname">Twitter:</label>
                        <input type="text" class="form-control" id="twitterInfo" placeholder="Enter twitter link" name="twitterInfo" value="{{ old('twitterInfo') }}" >  
                        @error('twitterInfo')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror     
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                        <label for="uname">LinkedIn:</label>
                        <input type="text" class="form-control" id="linkedInInfo" placeholder="Enter linkedIn link" name="linkedInInfo" value="{{ old('linkedInInfo') }}" >  
                        @error('linkedInInfo')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror     
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                        <label for="uname">Instagram:</label>
                        <input type="text" class="form-control" id="instagramInfo" placeholder="Enter instagram link" name="instagramInfo" value="{{ old('instagramInfo') }}" >  
                        @error('instagramInfo')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror     
                        </div>
                      </div>
                      
                    </div> 
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                        <label for="uname">Youtube:</label>
                        <input type="text" class="form-control" id="youtubeInfo" placeholder="Enter Youtube link" name="youtubeInfo" value="{{ old('youtubeInfo') }}" >  
                        @error('youtubeInfo')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror     
                        </div>
                      </div>                    
                      
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                        <label for="image">Logo Image:</label>
                        <input type="file" class="form-control" id="image"  name="image" >     
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror  
                        </div>
                      </div>
                    </div> 
                </div>  
            </div>  
            <button type="submit" class="btn btn-primary">Submit</button>
            <br/><br/>
          </form>
        </div>
        <!-- /.container-fluid -->      
      </section>
<!-- /.content -->
@stop 
      