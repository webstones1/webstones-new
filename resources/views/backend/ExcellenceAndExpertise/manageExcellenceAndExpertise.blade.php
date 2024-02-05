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
                <a href="{{ url('addExcellenceAndExpertise') }}"><button type="button" class="btn btn-info">Add New</button></a>
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
    @if($excellenceAndExpertises->isEmpty())
            <tr>
                <td class="text-center font-weight-bold">No records found.</td>
            </tr> 
    @else
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Tab Top Title</th>
                <th>Tab Right Title</th>
                <th>Tab Bottom Title</th>
                <th>Tab Left Title</th>
                <th>Image</th>
                <th colspan="3" style="text-align: center">Actions</th>
            </tr>
        </thead>
        <tbody>
        
            @foreach($excellenceAndExpertises as $excellenceAndExpertise)
                <tr>
                    <td>{{ $excellenceAndExpertise->title }}</td>
                    <td>{{ $excellenceAndExpertise->description }}</td>
                    <td>{{ $excellenceAndExpertise->tabTopTitle }}</td>
                    <td>{{ $excellenceAndExpertise->tabRightTitle }}</td>
                    <td>{{ $excellenceAndExpertise->tabBottomTitle }}</td>
                    <td>{{ $excellenceAndExpertise->tabLeftTitle }}</td>                   
                    <td>
                        <img src="{{ asset('storage/' . $excellenceAndExpertise->image) }}" alt="ExcellenceAndExpertise Image" style="width:100px;height:auto;">
                    </td>
                    <td><a href="editExcellenceAndExpertise/{{$excellenceAndExpertise->id}}"><button type="button" class="btn btn-primary">Edit</button></a></td>                    
                    <!-- <td><button type="button" class="btn btn-warning">Disable</button></td> -->
                    <td>
                        <a href="#" class="btn {{ $excellenceAndExpertise->is_enabled === 'y' ? 'btn-warning' : 'btn-success' }} enable-disable-button-excellence-and-expertise" data-excellenceandexpertise-id="{{ $excellenceAndExpertise->id }}">
                        {{ $excellenceAndExpertise->is_enabled === 'y' ? 'Disable' : 'Enable'}}
                        </a>
                    </td>
                    <td><a href="deleteExcellenceAndExpertise/{{$excellenceAndExpertise->id}}" onclick="return confirm('Are you sure you want to delete this record?');"><button type="button" class="btn btn-danger">Delete</button></a></td>
                </tr>
            @endforeach            
        </tbody>
    @endif
    </table>
    {{ $excellenceAndExpertises->links() }}

</div>
<!-- /.container-fluid -->  
</section>
<!-- /.content -->      
@stop 
      