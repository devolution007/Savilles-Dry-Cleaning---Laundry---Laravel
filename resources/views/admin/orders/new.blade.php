@extends('admin.layouts.master')
@section('title', 'List Users')
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
                        <h4 class="mb-sm-0">Orders</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Orders</a></li>
                                <li class="breadcrumb-item active">MNew</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                    <div class="card-title row" style="width: 30%;margin-top: 11px;">
                        <div class="d-flex align-items-center position-relative my-1">
                            <input class="form-control form-control-solid" placeholder="Pick date range" id="date-picker" />
                            <input type="hidden" name="date-input" id="date-input">
                            <button type="button" class="mx-3 btn btn-primary" onclick="exportButton()">Search</button>
                        </div>
                        <!--end::Search-->
                    </div>
                        <div class="card-body">
                            <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Order No</th>
                                        <th>Customer Name</th>
                                        <th>Order Created Date</th>
                                        <th>Collection Date</th>
                                        <th>Delivery Date</th>  
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1 @endphp
                                    @if(isset($getNewOrders))
                                    @foreach($getNewOrders as $section)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $section->name }}</td>
                                        <td>{{ $section->name }}</td>
                                        <td>{{ $section->created_at }}</td>
                                        <td>{{ $section->collection_date }}</td>
                                        <td>{{ $section->delivery_date }}</td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <abbr class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item edit-item-btn edit" data-url="{{ route('admin.order.edit',$section->id) }}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                                        <li>
                                                            <a class="dropdown-item remove-item-btn orderView" data-id="{{ $section->id }}" data-url="{{ route('admin.order.show',$section->id) }}">
                                                                <i class=" ri-eye-fill align-bottom me-2 text-muted"></i> View
                                                            </a>
                                                        </li>
                                                    </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @php $i++; @endphp
                                    @endforeach
                                    @endif
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
    <script>
        $(function() {
            var start = moment().startOf('month');
            var end = moment().endOf('month');
            function cb(start, end) {
                $('#date-picker span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                $("#date-input").val(start.format('YYYY-MM-DD')+'/'+end.format('YYYY-MM-DD'));
            }
            $('#date-picker').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cb);
            cb(start, end);
        });

        $(document).ready(function() {
           $('#date-picker').on('apply.daterangepicker',function(ev,picker){
                $("#date-input").val(picker.startDate.format('YYYY-MM-DD')+'-'+picker.endDate.format('YYYY-MM-DD'));
            });

            $('#date-picker').on('cancel.daterangepicker',function(ev,picker){
                $("#date-input").val('');
            });
        });
        
        function exportButton(){
            var start_date = $('input#date-picker').data('daterangepicker').startDate.format('YYYY-MM-DD');
            var end_date = $('input#date-picker').data('daterangepicker').endDate.format('YYYY-MM-DD');
            window.location.href = "{{ url('admin/orders/new/') }}/"+start_date+"/"+end_date;
        }

        $(document).on('click', '.orderView', function() {
                window.location.href = $(this).data('url');
            });
            $(document).on('click', '.edit', function() {
               window.location.href = $(this).data('url');
            });
    </script>
    @endpush