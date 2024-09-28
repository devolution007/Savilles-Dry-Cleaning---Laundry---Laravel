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
                        <h4 class="mb-sm-0">Categories</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Setting</a></li>
                                <li class="breadcrumb-item active">{{!empty($category) ? 'Edit' : 'Create'}} Main Category</li>
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
                            {{!empty($category) ? 'Edit Category' : 'Add New Category'}}</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="live-preview">
                                <form action="@if (!empty($category)) {{ route('admin.setting.update_catagory') }} @else {{ route('admin.setting.create_catagory') }} @endif" method="POST">
                                @csrf
                                @if (!empty($category))
                                <input type="hidden" class="form-control" placeholder="Enter your category name" name="id" value="{{ !empty($category) ? $category->id : null }}">
                                @endif
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="firstNameinput" class="form-label">Category</label>
                                                <input type="text" class="form-control" placeholder="Enter your category name" name="name" value="{{ !empty($category) ? $category->catagory_name : null }}" required>
                                                @error('code')
                                                <div class="text text-danger">
                                                {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-primary">{{!empty($category) ? 'Update' : 'Save'}}</button>
                                                <a href="{{ route('admin.setting.list_catagory') }}" class="btn btn-primary mx-4 float-right" style="float: right;" data-key="t-chat"> Back </a>
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