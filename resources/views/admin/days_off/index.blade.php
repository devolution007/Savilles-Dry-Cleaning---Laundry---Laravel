@extends('admin.layouts.master')
@if(!empty($user))
@section('title', 'Edit User')
@else
@section('title', 'Create User')
@endif
@section('content')
<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Off Days</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Off Days</a></li>
                                <li class="breadcrumb-item active">Days</li>
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
                                Off Days</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="live-preview">
                                <form action="{{ route('admin.offdays.store') }}" method="POST">
                                @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                        <label class="form-check form-check-custom form-check-solid me-10">
											<input class="form-check-input h-20px w-20px"  type="checkbox" name="days[]" value="Sun" @if(in_array("Sun",$days)) checked="checked" @endif>
											<span class="form-check-label fw-semibold">Sunday</span>
										</label>

                                        <label class="form-check form-check-custom form-check-solid me-10">
											<input class="form-check-input h-20px w-20px" type="checkbox" name="days[]" value="Mon" @if(in_array("Mon",$days)) checked="checked" @endif>
											<span class="form-check-label fw-semibold">Monday</span>
										</label>

                                        <label class="form-check form-check-custom form-check-solid me-10">
											<input class="form-check-input h-20px w-20px" type="checkbox" name="days[]" value="Tue" @if(in_array("Tue",$days)) checked="checked" @endif>
											<span class="form-check-label fw-semibold">Tuesday</span>
										</label>

                                        <label class="form-check form-check-custom form-check-solid me-10">
											<input class="form-check-input h-20px w-20px" type="checkbox" name="days[]" value="Wed" @if(in_array("Wed",$days)) checked="checked" @endif>
											<span class="form-check-label fw-semibold">Wednesday</span>
										</label>

                                        <label class="form-check form-check-custom form-check-solid me-10">
											<input class="form-check-input h-20px w-20px" type="checkbox" name="days[]" value="Thu" @if(in_array("Thu",$days)) checked="checked" @endif>
											<span class="form-check-label fw-semibold">Thursday</span>
										</label>

                                        <label class="form-check form-check-custom form-check-solid me-10">
											<input class="form-check-input h-20px w-20px" type="checkbox" name="days[]" value="Fri" @if(in_array("Fri",$days)) checked="checked" @endif>
											<span class="form-check-label fw-semibold">Friday</span>
										</label>

                                        <label class="form-check form-check-custom form-check-solid me-10">
											<input class="form-check-input h-20px w-20px" type="checkbox" name="days[]" value="Sat" @if(in_array("Sat",$days)) checked="checked" @endif>
											<span class="form-check-label fw-semibold">Saturday</span>
										</label>
                                        <br><br>
                                            <label class="form-check-custom form-check-solid me-10">
                                                <span class="form-check-label fw-semibold">Select multiple days for day off</span>
                                            </label>
                                            <input type="text" id="datePick" class="form-control" placeholder="Select Multiple Dates...." name="dates"/>
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

                            <div class="card-body">
                            <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th data-ordering="false">SR No.</th>
                                        <th class="min-w-125px">Off Date</th>
                                        <th data-ordering="false">Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1 @endphp
                                    @foreach($dated as $date)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $date['date'] }}</td>
                                        <td>{{ $date['created_at'] }}</td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <abbr class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li>
                                                            <a class="dropdown-item remove-item-btn delete" data-id="{{ $date['id'] }}" data-url="{{ url('admin/offdays/delete/'.$date['id']) }}">
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
    <script src="{{ asset('public/assets/datatable/1.11.5/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/assets/datatable/1.11.5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('public/assets/datatable/responsive/2.2.9/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/pages/datatables.init.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
	<script src="https://cdn.jsdelivr.net/gh/dubrox/Multiple-Dates-Picker-for-jQuery-UI@master/jquery-ui.multidatespicker.js"></script>
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
        })
    </script>
    <script>
    $(document).ready(function () {
      $('#datePick').multiDatesPicker();
    });
  </script>
    @endpush
