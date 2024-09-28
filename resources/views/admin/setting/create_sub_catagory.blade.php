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
                                <li class="breadcrumb-item active">{{ !empty($service) ? 'Edit' : 'Create' }} Sub Catagory</li>
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
                                {{ !empty($service) ? 'Edit Sub Catagory' : 'Add New Sub Catagory' }}
                            </h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="live-preview">
                                <form action="@if (!empty($service)) {{ route('admin.setting.update_sub_catagory', $service->id) }} @else {{ route('admin.setting.create_sub_catagory') }} @endif" method="POST">
                                    @csrf
                                    @if (!empty($service))
                                <input type="hidden" class="form-control" placeholder="Enter your category name" name="id" value="{{ !empty($service) ? $service->id : null }}">
                                @endif
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="firstNameinput" class="form-label">Category</label>
                                                <select class="form-control form-control-solid" name="category_id">
                                                    <option value="">select</option>
                                                    @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" @if (!empty($service) && $service->main_cat_id == $category->id) selected
                                                        @elseif(!empty(old('category_id')) && old('category_id') == $category->id)
                                                        selected @endif>
                                                        {{ $category->catagory_name }}
                                                    </option>
                                                    @endforeach
                                                </select>

                                                @error('category_id')
                                                <div class="text text-danger">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="firstNameinput" class="form-label">Sub Category</label>
                                                <input type="text" class="form-control" placeholder="Enter your title" name="sub_cat_name" value="{{ !empty($service) ? $service->sub_cat_name : old('title') }}" required>
                                                @error('title')
                                                <div class="text text-danger">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="firstNameinput" class="form-label">Url</label>
                                                <input type="text" class="form-control" placeholder="Enter your title" name="url" value="{{ !empty($service) ? $service->url : old('title') }}" required>
                                                @error('title')
                                                <div class="text text-danger">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-primary">{{ !empty($service) ? 'Update' : 'Save' }}</button>
                                                <a href="{{ route('admin.setting.list_sub_catagory') }}" class="btn btn-primary mx-4 float-right" style="float: right;" data-key="t-chat"> Back </a>
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