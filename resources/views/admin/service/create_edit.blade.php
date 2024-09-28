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
                        <h4 class="mb-sm-0">Services</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Services</a></li>
                                <li class="breadcrumb-item active">{{ !empty($service) ? 'Edit' : 'Create' }} Service</li>
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
                                {{ !empty($service) ? 'Edit Service' : 'Add New Service' }}
                            </h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="live-preview">
                                <form action="@if (!empty($service)) {{ route('admin.service.update', $service->id) }} @else {{ route('admin.service.store') }} @endif" method="POST">
                                    @csrf
                                    @if (!empty($service))
                                    @method('PUT')
                                    @endif
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="firstNameinput" class="form-label">Title</label>
                                                <input type="text" class="form-control" placeholder="Enter your title" name="title" value="{{ !empty($service) ? $service->title : old('title') }}" required>
                                                @error('title')
                                                <div class="text text-danger">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="firstNameinput" class="form-label">Price</label>
                                                <input type="number" class="form-control form-control-solid" name="price" value="{{ !empty($service) ? $service->price : old('price') }}" step="any" required min="1" />
                                                @error('price')
                                                <div class="text text-danger">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="firstNameinput" class="form-label">Section</label>
                                                <select class="form-control form-control-solid" name="section_id">
                                                    <option value="">select</option>
                                                    @foreach ($sections as $section)
                                                    <option value="{{ $section->id }}" @if (!empty($service) && $service->section_id == $section->id) selected
                                                        @elseif(!empty(old('section_id')) && old('section_id') == $section->id)
                                                        selected @endif>
                                                        {{ $section->name }}
                                                    </option>
                                                    @endforeach
                                                </select>

                                                @error('section_id')
                                                <div class="text text-danger">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="firstNameinput" class="form-label">Category</label>
                                                <select class="form-control form-control-solid" name="category_id">
                                                    <option value="">select</option>
                                                    @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" @if (!empty($service) && $service->category_id == $category->id) selected
                                                        @elseif(!empty(old('category_id')) && old('category_id') == $category->id)
                                                        selected @endif>
                                                        {{ $category->name }}
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
                                                <label for="firstNameinput" class="form-label">Description</label>
                                                <textarea class="form-control form-control-solid" name="description" rows="2">{{ !empty($service) ? $service->description : old('description') }}</textarea>
                                                @error('description')
                                                <div class="text text-danger">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-primary">{{ !empty($service) ? 'Update' : 'Save' }}</button>
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