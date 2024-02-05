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
                <a href="{{ url('addSubMenu') }}"><button type="button" class="btn btn-info">Add SubMenu</button></a>
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
    @if($submenus->isEmpty()) 
            <tr>
                <td class="text-center font-weight-bold">No records found.</td>
            </tr> 
    @else
        <thead>
            <tr>
                <th>Menu</th>
                <th>Sub Menu</th>
                <th>Link</th>
                <th colspan="4" style="text-align: center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($submenus as $submenu)
                <tr>
                    <td>{{ $submenu->menu->title }}</td>
                    <td>{{ $submenu->title }}</td>
                    <td>{{ $submenu->link }}</td>
                    <td><a href="editSubMenu/{{$submenu->id}}"><button type="button" class="btn btn-primary">Edit</button></a></td>                    
                    <!-- <td><button type="button" class="btn btn-warning">Disable</button></td> -->
                    <td>
                        <a href="#" class="btn {{ $submenu->is_enabled === 'y' ? 'btn-warning' : 'btn-success' }} enable-disable-button-submenu"
                        data-submenu-id="{{ $submenu->id }}">
                        {{ $submenu->is_enabled === 'y' ? 'Disable' : 'Enable' }}
                        </a>
                    </td>
                    <td><a href="deleteSubMenu/{{$submenu->id}}" onclick="return confirm('Are you sure you want to delete this record?');"><button type="button" class="btn btn-danger">Delete</button></a></td>
                </tr>
            @endforeach
        </tbody>
    @endif
    </table>

    {{ $submenus->links() }}

</div>
<!-- /.container-fluid -->  
</section>
<!-- /.content -->      
@stop 
      