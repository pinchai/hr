@extends('master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/users') }}">User list</a></li>
                        <li class="breadcrumb-item active">Create Users</li>
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
                            <form action="{{ route('create_user') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

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
                                        value="{{ old('name') }}"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select class="form-control form-control" id="gender" name="gender">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input
                                        id="password"
                                        autocomplete="off"
                                        required
                                        type="password"
                                        class="form-control"
                                        name="password"
                                        value="{{ old('password') }}"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input
                                        id="confirm_password"
                                        autocomplete="off"
                                        required
                                        type="password"
                                        class="form-control"
                                        name="confirm_password"
                                        value="{{ old('confirm_password') }}"
                                    >
                                </div>
                                <button type="reset" class="btn btn-danger float-left">
                                    <i class="fas fa-window-close"></i>
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-primary float-right">
                                    <i class="fas fa-save"></i>
                                    Submit
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
