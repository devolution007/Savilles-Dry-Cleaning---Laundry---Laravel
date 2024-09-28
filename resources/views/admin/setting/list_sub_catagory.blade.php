@extends('admin.layouts.master')
@section('title', 'List timings')
<link rel="stylesheet" href="{{ asset('public/assets/datatable/1.11.5/css/dataTables.bootstrap5.min.css') }}" />
<link rel="stylesheet" href="{{ asset('public/assets/datatable/responsive/2.2.9/css/responsive.bootstrap.min.css') }}" />

@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Sub Categories</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Setting</a></li>
                                <li class="breadcrumb-item active">Sub Categories list</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card">

                <div class="card-body">
                    {{-- <button type="submit" data-kt-contacts-type="submit" value="Add" name="status" class="btn btn-primary mx-4 float-right" style="float: right;">
                        <span class="">Add Catagory</span>
                    </button> --}}
                    <a href="{{ route('admin.setting.sub_catagory') }}" class="btn btn-primary mx-4 float-right" style="float: right;" data-key="t-chat"> Add New Sub Catagory </a>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-body">
                            <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th data-ordering="false">SR No.</th>
                                        <th class="min-w-125px">Main Catagory</th>
                                        <th class="min-w-125px">Sub Catagory</th>
                                        <th data-ordering="false">Created Date</th>
                                        <th data-ordering="false">Last Updated Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1 @endphp
                                    @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $category->main_category_name }}</td>
                                        <td>{{ $category->sub_cat_name }}</td>
                                        <td>{{ $category->created_at }}</td>
                                        <td>{{ $category->updated_at }}</td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <abbr class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item edit-item-btn edit" data-url="{{ route('admin.setting.edit_sub_catagory',$category->id) }}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                                        <li>
                                                            <a class="dropdown-item remove-item-btn delete" data-id="{{ $category->id }}" data-url="{{ url('admin/setting/delete-sub-catagory/'.$category->id) }}">
                                                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                                            </a>
                                                        </li>
                                                    </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @php $i++; @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
    <script src="{{ asset('public/assets/datatable/1.11.5/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/assets/datatable/1.11.5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('public/assets/datatable/responsive/2.2.9/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/pages/datatables.init.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.delete', function() {
                event.preventDefault();
                Swal.fire({
                    title: 'Are you sure you want to delete this record?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        var url = $(this).data('url');
                        var id = $(this).data('id');
                        $.ajax({
                            url: url,
                            method: 'get',
                           
                            success: function(data) {
                                if (data.success) {
                                    toastr.success(data.message);
                                    location.reload();
                                } else {
                                    toastr.error(data.message);
                                }
                            },
                        });
                    }
                })
            });
            $(document).on('click', '.edit', function() {
                window.location.href = $(this).data('url');
            });
        })
    </script>
    @endpush