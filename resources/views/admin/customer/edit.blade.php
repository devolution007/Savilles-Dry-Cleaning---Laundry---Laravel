@extends('admin.layouts.master')
@section('title', 'Edit Customer')
@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Customer</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Customer</a></li>
                                <li class="breadcrumb-item active">Edit Customer</li>
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
                            <h4 class="card-title mb-0 flex-grow-1">                                
                            Edit Customer</h4>
                        </div>
                        <div class="card-body">
                            <div class="live-preview">
                                <form action="{{ route('admin.customer.update', $customer->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="firstNameinput" class="form-label">Name</label>
                                                <input type="text" class="form-control" placeholder="Enter your name" name="name" value="{{ !empty($user) ? $user->name : null }}" required>
                                                @error('name')
                                                <div class="text text-danger">
                                                {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="firstNameinput" class="form-label">Email</label>
                                                <input type="email" class="form-control" placeholder="Enter your email" name="email" value="{{ !empty($user) ? $user->email : null }}" required>
                                                @error('email')
                                                <div class="text text-danger">
                                                {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="firstNameinput" class="form-label">Phone</label>
                                                <input type="text" class="form-control" placeholder="Enter your phone no" name="phone_no" value="{{ !empty($customer) ? $customer->phone_no : null }}" required>
                                                @error('phone_no')
                                                <div class="text text-danger">
                                                {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="firstNameinput" class="form-label">Postcode</label>
                                                <input type="text" class="form-control" placeholder="Enter your postcode" name="postcode" value="{{ !empty($customer) ? $customer->postcode : null }}" required>
                                                @error('postcode')
                                                <div class="text text-danger">
                                                {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="firstNameinput" class="form-label">Address</label>
                                                <input type="text" class="form-control" placeholder="Enter your address" name="address" value="{{ !empty($customer) ? $customer->address : null }}" required>
                                                @error('address')
                                                <div class="text text-danger">
                                                {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="firstNameinput" class="form-label">Address 1</label>
                                                <input type="text" class="form-control" placeholder="Enter your address" name="address_1" value="{{ !empty($customer) ? $customer->address_1 : null }}" required>
                                                @error('address_1')
                                                <div class="text text-danger">
                                                {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-primary">{{!empty($customer) ? 'Update' : 'Save'}}</button>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> 

                
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