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
                <?php
                if(!$settings)
                {
                ?>
                <a href="{{ url('addSettings') }}"><button type="button" class="btn btn-info">Add New</button></a>
                <?php
                }
                ?>
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
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif


<table class="table table-bordered">
    @if($settings->isEmpty())
            <tr>
                <td class="text-center font-weight-bold">No records found.</td>
            </tr> 
    @else
        <thead>
            <tr>
                <th>Logo Tagline</th>
                <th>Logo Link</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Description</th>                
                <th>Image</th>
                <th colspan="3" style="text-align: center">Actions</th>
            </tr>
        </thead>
        <tbody>        
            @foreach($settings as $setting)
                <tr>
                    <td>{{ $setting->logoTagLine }}</td>
                    <td>{{ $setting->logoLink }}</td>
                    <td>{{ $setting->contactInfo }}</td>
                    <td>{{ $setting->emailId }}</td>
                    <td>{{ $setting->description }}</td>                                     
                    <td>
                        <img src="{{ asset('storage/' . $setting->image) }}" alt="settings Image" style="width:100px;height:auto;">
                    </td>
                    <td><a href="editSetting/{{$setting->id}}"><button type="button" class="btn btn-primary">Edit</button></a></td>                    
                    <!-- <td><button type="button" class="btn btn-warning">Disable</button></td> -->
                    <td>
                        <a href="#" class="btn {{ $setting->is_enabled === 'y' ? 'btn-warning' : 'btn-success' }} enable-disable-button-settings" data-settings-id="{{ $setting->id }}">
                        {{ $setting->is_enabled === 'y' ? 'Disable' : 'Enable'}}
                        </a>
                    </td>
                    <td><a href="deleteSettings/{{$setting->id}}" onclick="return confirm('Are you sure you want to delete this record?');"><button type="button" class="btn btn-danger">Delete</button></a></td>
                </tr>
            @endforeach            
        </tbody>
    @endif
    </table>
    {{ $settings->links() }}

</div>
<!-- /.container-fluid -->  
</section>
<!-- /.content -->      
@stop 
      