@extends('admin.layouts.master')
@section('title', 'Edit Order')

@section('content')
<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Orders
            </h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">Orders</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">Edit Order</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <!--begin::Filter menu-->

            <!--end::Filter menu-->
            <!--begin::Secondary button-->
            <!--end::Secondary button-->
            <!--begin::Primary button-->

            <!--end::Primary button-->
        </div>
        <!--end::Actions-->
    </div>
    <!--end::Toolbar container-->
</div>
<!--end::Toolbar-->
<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">

    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Contacts App- Add New Contact-->
        <div class="row g-7">

            <!--begin::Content-->
            <div class="col-xl-12">
                <!--begin::Contacts-->
                <div class="card card-flush h-lg-100" id="kt_contacts_main">
                    <!--begin::Card header-->
                    <div class="card-header pt-7" id="kt_chat_contacts_header">
                        <!--begin::Card title-->

                        <div class="card-title">
                            <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                            <form class="form" action="{{ route('admin.orders.completed', $order->id) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <!--end::Svg Icon-->
                                    <div class="col-md-6">
                                        <h2>Edit Order</h2>
                                    </div>
                                    <div class="col-md-6">
                                        @if($order->status == "completed")
                                        <span class="badge badge-primary fw-bold mx-3 py-3">{{$order->status}}</span>
                                        @else
                                        <span class="badge badge-danger fw-bold mx-3 py-3">{{$order->status}}</span>
                                        @endif


                                        @if($order->status == "pending")
                                        <button type="submit" data-kt-contacts-type="submit" value="ongoing" name="status" class="btn btn-warning mx-4 float-right" style="float: right;">
                                            <span class="">Ongoing</span>
                                        </button>
                                        @elseif($order->status == "ongoing")
                                        <button type="submit" data-kt-contacts-type="submit" value="ontheway" name="status" class="btn btn-info mx-4 float-right" style="float: right;">
                                            <span class="">On The Way</span>
                                        </button>
                                        @elseif($order->status == "ontheway")
                                        <button type="submit" data-kt-contacts-type="submit" value="delivered" name="status" class="btn btn-info mx-4 float-right" style="float: right;">
                                            <span class="">Delivered</span>
                                        </button>

                                        @else
                                        <button type="submit" data-kt-contacts-type="submit" value="complete" name="status" class="btn btn-success mx-4 float-right" style="float: right;">
                                            <span class="">Complete Order</span>
                                        </button>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-5">
                        <!--begin::Form-->
                        <form id="kt_ecommerce_settings_general_form" class="form" action="{{ route('admin.order.update', $order->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <h4>
                                    Customer Details
                                </h4>
                                <!--end::Label-->
                                <!--begin::Input-->

                                <div class="row">
                                    <div class="col-md-4"><b>Name:</b>
                                        @if(!isset($order->customer->user->name))
                                        @else
                                        {{ $order->customer->user->name }}
                                        @endif
                                    </div>
                                    <div class="col-md-4"><b>Email</b>
                                        @if(!isset($order->customer->user->name))

                                        @else
                                        {{$order->customer->user->email }}
                                        @endif
                                    </div>
                                    <div class="col-md-4"><b>Address</b>
                                        @if(!isset($order->customer->user->name))

                                        @else
                                        {{ $order->customer->address }}
                                        @endif
                                    </div>
                                </div>


                                <!--end::Label-->
                                <!--begin::Input-->

                                <div class="row mt-5">
                                    <h4>
                                        Order Details
                                    </h4>
                                    <div class="row">
                                        <div class="col-md-6"><b>Collection Date:</b>
                                            {{ $order->collection_date }}
                                        </div>
                                        <div class="col-md-6"><b>Collection Time:</b>
                                            {{ $order->collection_time }}
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6"><b>Delivery Date:</b>
                                            {{ $order->delivery_date }}
                                        </div>
                                        <div class="col-md-6"><b>Delivery Time:</b>
                                            {{ $order->delivery_time }}
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-6"><b>Instruction:</b>
                                            {{ $order->instruction }}
                                        </div>
                                        <div class="col-md-6"><b>Information:</b>
                                            {{ $order->infomation }}
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-6"><b>Frequency:</b>
                                            {{ $order->frequency }}
                                        </div>
                                    </div>


                                </div>

                                <!--end::Input-->
                            </div>


                            <!--end::Row-->

                            <!--begin::Separator-->
                            <div class="separator mb-6"></div>
                            <!--end::Separator-->
                            <!--begin::Action buttons-->
                            <div class="d-flex justify-content-end">
                                <!--begin::Button-->
                                <!--end::Button-->
                                <!--begin::Button-->
                                @if($order->payment_status == "not-paid")
                                <button type="submit" data-kt-contacts-type="submit" value="charge" class="btn btn-primary mx-4 float-right">
                                    <span class="">Charge</span>
                                </button>
                                @endif
                                <!--end::Button-->
                            </div>
                            <!--end::Action buttons-->
                        </form>
                        <form action="{{route('admin.order.update_date',$order->id)}}" method="POST">
                            @csrf

                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <div class="row">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Collection</span>
                                    </label>
                                    <div class="col-md-6">
                                        <label for="">Date</label>
                                        <input type="date" required class="form-control" name="collection_date" value="{{$order->collection_date}}">
                                        @error('collection_date')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Time</label>
                                        <select required name="collection_time" class="form-control">
                                            <option value="08.00 - 09.00" {{ $order->collection_time  == '08.00 - 09.00' ? 'selected' : '' }}>
                                                08.00 - 09.00</option>
                                            <option value="09.00 - 10.00" {{ $order->collection_time == '09.00 - 10.00' ? 'selected' : '' }}>
                                                09.00 - 10.00</option>
                                            <option value="10.00 - 11.00" {{ $order->collection_time == '10.00 - 11.00' ? 'selected' : '' }}>
                                                10.00 - 11.00</option>
                                        </select>
                                        @error('collection_time')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Delivery</span>
                                    </label>
                                    <div class="col-md-6">
                                        <label for="">Date</label>
                                        <input type="date" required class="form-control" name="delivery_date" value="{{$order->delivery_date}}">
                                        @error('delivery_date')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Time</label>
                                        <select required name="delivery_time" class="form-control">
                                            <option value="08.00 - 09.00" {{ $order->delivery_time  == '08.00 - 09.00' ? 'selected' : '' }}>
                                                08.00 - 09.00</option>
                                            <option value="09.00 - 10.00" {{ $order->delivery_time == '09.00 - 10.00' ? 'selected' : '' }}>
                                                09.00 - 10.00</option>
                                            <option value="10.00 - 11.00" {{ $order->delivery_time == '10.00 - 11.00' ? 'selected' : '' }}>
                                                10.00 - 11.00</option>
                                        </select>
                                        @error('delivery_time')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-primary my-4 float-right" type="submit">Update</button>
                                </div>
                            </div>
                        </form>
                        @if($order->payment_status == "not-paid")
                        <h3>Service</h3>
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span class="required">Service</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->

                            <select class="form-control form-control-solid" name="services" onchange="addService(this)">
                                <option value="">select</option>
                                @foreach ($setions as $section)
                                <optgroup label="{{ $section->name }}">
                                    @foreach ($section->services as $service)
                                    <option value="{{ $service->id }}">{{ $service->title }}</option>
                                    @endforeach
                                </optgroup>
                                @endforeach
                            </select>

                            <!--end::Input-->
                        </div>

                        <form action="{{route('admin.order.add_service',$order->id)}}" method="POST" id="serviceForm">
                            @csrf
                            <div class="fv-row mb-7 d-none" id="parent">
                                <!--begin::Label-->
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Add Service</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"></i>
                                </label>

                                <div class="row" id="add-service">

                                </div>

                                <div class="d-flex justify-content-end">
                                    <button class="float-left btn btn-primary save-service mt-3" type="submit">Add
                                        Services</button>
                                </div>
                                <!--end::Label-->
                                <!--begin::Input-->
                            </div>
                        </form>
                        @endif
                        @if(!empty($services))
                        <h3>Added Service</h3>
                        <div class="fv-row mb-7">
                            <table class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                        <th>#</th>
                                        <th>Service</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Sub Total</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="text-gray-600 fw-semibold">
                                    @php
                                    $total = 0;
                                    $i = 1;
                                    @endphp
                                    @foreach($services as $service)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{$service->service->title}}</td>
                                        <td>{{$service->qty}}</td>
                                        <td>{{$service->service->price}}</td>
                                        <td>&#163;{{$service->service->price * $service->qty}}</td>
                                        @php
                                        $total += $service->service->price * $service->qty;
                                        @endphp
                                    </tr>
                                    @php $i++; @endphp
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="text-center"><strong>Total</strong></td>
                                        <td>&#163;{{$total}}</td>
                                    </tr>
                                </tfoot>
                                <!--end::Table body-->
                            </table>
                        </div>
                        @endif
                        <!--end::Form-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Contacts-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Contacts App- Add New Contact-->
    </div>
    <!--end::Content container-->
</div>
<!--end::Content-->
@endsection
@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    function addService(that) {
        var id = $(that).val();
        var html = "<div class='row parent-service'>";
        html += "<div class='col-md-6 text-center mt-3'>";
        html += "<h4>" + $("option:selected", that).text() + "</h4></div>";
        html += "<input type='hidden' name='name[" + id + "]' value='" + $("option:selected", that).text() + "'>";
        html += "<div class='col-md-6 text-center mt-3'>";
        html += "<div class='row'>";
        html += "<div class='col-md-6'>";
        html += "<input type='number' name='qty[" + id +
            "]' class='form-control form-control-solid qty' placeholder='Quantity' min='1' data-id='" + id + "'><div class='text-danger'></div>";
        html += "</div>";
        html += "<div class='col-md-6'>";
        html += "<a href='javascript:void()' class='remove'><h1 class='text-danger'>X</h1></a>";
        html += "</div>";
        html += "</div>";
        html += "</div>";
        html += "</div>";
        $('#add-service').append(html)
        $('#parent').removeClass("d-none");
    }
    $(document).on('click', '.remove', function() {
        $(this).parents('.parent-service').remove();
    });

    $(document).on('click', '.save-service', function() {
        var check = true;
        $('.qty').each(function(index) {
            if ($(this).val() < 1) {
                $(this).parent().find('.text-danger').html("Invalid value");
                check = false;
            } else {
                $(this).parent().find('.text-danger').html("");
            }
        });
        if (!check) {
            return check;
        }

        $('#serviceForm').submit();
    });
</script>
@endpush
