@extends('master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('index_create_user') }}">
                                <button type="button" class="btn btn-primary">
                                    <i class="fas fa-plus-circle"></i>
                                    Add
                                </button>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm table-borderless table-striped">
                                    <thead>
                                    <tr class="bg-primary">
                                        <th>No.</th>
                                        <th width="100">Profile</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $item)
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                @if($item->profile != null)
                                                    <img
                                                        style="width: 100%"
                                                        class="img img-thumbnail"
                                                        src="{{ asset('images').'/'.$item->profile}}"
                                                    >
                                                @endif
                                                @if($item->profile == null)
                                                    <i class="far fa-user"></i>
                                                @endif
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->gender }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>
                                                <a href="{{ route('index_update_user').'?user_id='.$item->id }}">
                                                    <button>
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                </a>
                                                <a href="{{ route('index_confirm_delete').'?user_id='.$item->id }}">
                                                    <button class="text-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
