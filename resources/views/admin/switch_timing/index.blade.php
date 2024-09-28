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
                        <h4 class="mb-sm-0">Switch Timings</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Switch</a></li>
                                <li class="breadcrumb-item active">Timings</li>
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
                            Switch Timings</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="live-preview">
                                <form action="{{ route('admin.switch.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-check form-check-custom form-check-solid me-10">
                                                <input class="form-check-input h-20px w-20px" type="radio" name="switch" value="yes" @if(!empty($switch) && $switch->switch == "yes") checked="checked" @endif>
                                                <span class="form-check-label fw-semibold">Enable</span>
                                            </label>

                                            <label class="form-check form-check-custom form-check-solid me-10">
                                                <input class="form-check-input h-20px w-20px" type="radio" name="switch" value="no" @if(!empty($switch) && $switch->switch == "no") checked="checked" @endif>
                                                <span class="form-check-label fw-semibold">Disable</span>
                                            </label>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-primary">Save</button>
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