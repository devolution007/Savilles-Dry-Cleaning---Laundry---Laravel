@extends('admin.layouts.master')
@section('title', 'List timings')
<link rel="stylesheet" href="{{ asset('public/assets/datatable/1.11.5/css/dataTables.bootstrap5.min.css') }}" />
<link rel="stylesheet" href="{{ asset('public/assets/datatable/responsive/2.2.9/css/responsive.bootstrap.min.css') }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.css" integrity="sha512-gp+RQIipEa1X7Sq1vYXnuOW96C4704yI1n0YB9T/KqdvqaEgL6nAuTSrKufUX3VBONq/TPuKiXGLVgBKicZ0KA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Orders</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Orders</a></li>
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
                            <div class="col-md-6">
                                <form action="{{route('admin.order.export')}}" method="POST">
                                    @csrf
                                    <!--begin::Search-->
                                    <div class="d-flex align-items-center position-relative my-1">
                                        <input class="form-control form-control-solid" placeholder="Pick date range" id="date-picker" />
                                        <button type="submit" class="mx-3 btn btn-primary">Export</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card">

                        <div class="card-body">
                            <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th data-ordering="false">SR No.</th>
                                        <th>Customer Name</th>
                                        <th>Collection Date</th>
                                        <th>Delivery Date</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1 @endphp
                                    @foreach($completeOrders as $order)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->collection_date }}</td>
                                        <td>{{ $order->delivery_date }}</td>
                                        <td>{{ $order->created_at }}</td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <abbr class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <!-- <li><a class="dropdown-item edit-item-btn edit" data-url="{{ route('admin.order.edit',$order->id) }}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li> -->
                                                    <li>
                                                        <a class="dropdown-item remove-item-btn orderView" data-id="{{ $order->id }}" data-url="{{ route('admin.order.show',$order->id) }}">
                                                            <i class=" ri-eye-fill align-bottom me-2 text-muted"></i> View
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/moment.min.js" integrity="sha512-i2CVnAiguN6SnJ3d2ChOOddMWQyvgQTzm0qSgiKhOqBMGCx4fGU5BtzXEybnKatWPDkXPFyCI0lbG42BnVjr/Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js" integrity="sha512-mh+AjlD3nxImTUGisMpHXW03gE6F4WdQyvuFRkjecwuWLwD2yCijw4tKA3NsEFpA1C3neiKhGXPSIGSfCYPMlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
         $(document).ready(function() {
            var start = moment().startOf('month');
            var end = moment().endOf('month');

            $("#date-picker").daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    "Today": [moment(), moment()],
                    "Yesterday": [moment().subtract(1, "days"), moment().subtract(1, "days")],
                    "Last 7 Days": [moment().subtract(6, "days"), moment()],
                    "Last 30 Days": [moment().subtract(29, "days"), moment()],
                    "This Month": [moment().startOf("month"), moment().endOf("month")],
                    "Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1,
                        "month").endOf("month")]
                }
            });
            $(document).on('click', '.orderView', function() {
                window.location.href = $(this).data('url');
            });
            $(document).on('click', '.edit', function() {
               window.location.href = $(this).data('url');
            });
        })
    </script>
    @endpush
