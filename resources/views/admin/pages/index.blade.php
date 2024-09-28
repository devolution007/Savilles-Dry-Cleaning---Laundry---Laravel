@extends('admin.layouts.master')
@section('title', 'Pages')
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
                        <h4 class="mb-sm-0">Pages</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                <li class="breadcrumb-item active">list</li>
                            </ol>
                        </div>
                    </div>
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
                                        <th>Sr. #</th>
                                        <th>Title</th>
                                        <th>Slug</th>
                                        <th>Excerpt</th>
                                        <th data-ordering="false">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1 @endphp
                                    @foreach ($pages as $page)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $page->title }}</td>
                                        <td>{{ $page->slug }}</td>
                                        <td>{{ $page->excerpt }}</td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item edit-item-btn edit" data-url="{{ route('admin.pages.edit', $page->id) }}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                                    <li>
                                                        <a class="dropdown-item remove-item-btn delete" data-id="{{ $page->id }}" data-url="{{ route('admin.pages.destroy', $page->id) }}">
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
                        $.ajax({
                            url: url,
                            method: 'DELETE',
                            data: {
                                '_token': '{{csrf_token()}}'
                            },
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