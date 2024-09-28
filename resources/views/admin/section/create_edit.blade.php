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
                        <h4 class="mb-sm-0">Sections</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Sections</a></li>
                                <li class="breadcrumb-item active">{{ !empty($section) ? 'Edit' : 'Create' }}</li>
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
                            <h4 class="card-title mb-0 flex-grow-1">{{ !empty($section) ? 'Edit Section' : 'Add New Section' }}</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="live-preview">
                                <form action="@if (!empty($section)) {{ route('admin.section.update', $section->id) }} @else {{ route('admin.section.store') }} @endif" method="POST">
                                    @csrf
                                    @if (!empty($section))
                                    @method('PUT')
                                    @endif
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="firstNameinput" class="form-label">Name</label>
                                                <input type="text" class="form-control" placeholder="Enter your name" name="name" value="{{ !empty($section) ? $section->name : old('name') }}" required>
                                                @error('name')
                                                <div class="text text-danger">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="emailidInput" class="form-label">Icon</label>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        @foreach ($icons as $key => $icon)
                                                        <div class="col-md-2 mb-5 text-center">
                                                            <img src="{{ asset('public/'.$icon->icon) }}" height="100px" width="100px" /></br>
                                                            <input type="radio" name="section_icon_id" value="{{ $icon->id }}" id="{{ $icon->id }}" @if (!empty($section) && $section->section_icon_id == $icon->id) checked @elseif(old('section_icon_id') == $icon->id) checked @endif /></br>
                                                            <label for="{{ $icon->id }}">icon {{ $key }}</label>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>

                                                @error('section_icon_id')
                                                <div class="text text-danger">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="address1ControlTextarea" class="form-label">Tags</label>
                                                <select class="form-control form-control-solid select2" name="tag_id[]" multiple="multiple">
                                                    <option value="">select</option>
                                                    @foreach ($tags as $tag)
                                                    <option value="{{ $tag->id }}" @if (!empty($section) && in_array( $tag->id,
                                                        $section->tags()->get()->pluck('id')->toArray())) selected
                                                        @elseif(!empty(old('tag_id')) && in_array($tag->id, old('tag_id')))
                                                        selected @endif>
                                                        {{ $tag->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('tag_id')
                                                <div class="text text-danger">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="address1ControlTextarea" class="form-label">Description</label>
                                                <input type="text" class="form-control form-control-solid" name="description"
                                                    value="{{ !empty($section) ? $section->description : old('description') }}"
                                                    required />
                                                @error('description')
                                                    <div class="text text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="address1ControlTextarea" class="form-label">Keywords</label>
                                                <textarea class="form-control form-control-solid" name="keywords" rows="3">{{!empty($section) ? $section->keywords : old('keywords')}}</textarea>
                                                @error('keywords')
                                                    <div class="text text-danger">
                                                        {{ $message }}
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
@push('scripts')
    <script>
        $(document).ready(function() {
            $('select').select2();
        })
    </script>
@endpush