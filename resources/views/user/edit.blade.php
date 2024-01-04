@extends('master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('index_user') }}">User list</a></li>
                        <li class="breadcrumb-item active">Edit Users</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form
                                action="{{ route('update_user') }}"
                                method="post"
                                enctype="multipart/form-data"
                            >
                                @csrf
                                <input type="hidden" name="id" value="{{ $data->id }}">

{{--                                @if ($errors->any())--}}
{{--                                    <div class="alert alert-danger">--}}
{{--                                        <ul>--}}
{{--                                            @foreach ($errors->all() as $error)--}}
{{--                                                <li>{{ $error }}</li>--}}
{{--                                            @endforeach--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                @endif--}}

                                <div class="form-group">
                                    <label for="image">Old Profile</label>
                                    <br>
                                    <img
                                        style="width: 100px"
                                        src="{{ asset('images').'/'.$data->profile }}"
                                        class="image img-thumbnail"
                                    >
                                </div>

                                <div class="form-group">
                                    <label for="image">User Profile</label>
                                    <input
                                        class="form-control"
                                        id="image"
                                        name="image"
                                        type="file"
                                    >
                                </div>

                                <div class="form-group">
                                    <label for="text">User Name</label>
                                    <input
                                        name="name"
                                        autocomplete="off"
                                        required
                                        type="text"
                                        class="form-control"
                                        id="text"
                                        aria-describedby="text"
                                        value="{{ $data->name }}"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select
                                        class="form-control form-control"
                                        id="gender"
                                        name="gender"
                                    >
                                        <option {{ $data->gender == 'Male' ? 'selected' : ''}}>Male</option>
                                        <option {{ $data->gender == 'Female' ? 'selected' : ''}}>Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input
                                        id="password"
                                        autocomplete="off"
                                        type="password"
                                        class="form-control"
                                        name="password"
                                    >
                                </div>
                                <button type="reset" class="btn btn-danger float-left">
                                    <i class="fas fa-window-close"></i>
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-primary float-right">
                                    <i class="fas fa-save"></i>
                                    Update
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
