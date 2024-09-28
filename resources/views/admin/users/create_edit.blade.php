@extends('admin.layouts.master')
@if(!empty($user))
@section('title', 'Edit User')
@else
@section('title', 'Create User')
@endif
@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">User</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                                <li class="breadcrumb-item active">{{!empty($user) ? 'Edit' : 'Create'}} User</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xxl-6">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">{{!empty($user) ? 'Edit User' : 'Add New User'}}</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="live-preview">
                                <form action="@if (!empty($user)) {{ route('admin.user.update', $user->id) }} @else {{ route('admin.user.store') }} @endif" method="POST">
                                @csrf
                                @if (!empty($user))
                                    @method('PUT')
                                @endif
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="firstNameinput" class="form-label">Name</label>
                                                <input type="text" class="form-control" placeholder="Enter your name" name="name" value="{{ !empty($user) ? $user->name : old('name') }}" required>
                                                @error('name')
                                                <div class="text text-danger">
                                                {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="emailidInput" class="form-label">Email Address</label>
                                                <input type="text" class="form-control" placeholder="example@gamil.com" name="email" value="{{ !empty($user) ? $user->email : old('email') }}" required>
                                                @error('email')
                                                    <div class="text text-danger">
                                                    {{$message}}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="address1ControlTextarea" class="form-label">Password</label>
                                                <input type="password" class="form-control" placeholder="Password" name="password" {{ !empty($user) ? null : "required" }}>
                                                @error('password')
                                                    <div class="text text-danger">
                                                    {{$message}}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-primary">{{!empty($user) ? 'Update' : 'Save'}}</button>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->

                
            </div>
            <!--end row-->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Savilles Dry Cleaners.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design & Develop by Themesbrand
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
@endsection