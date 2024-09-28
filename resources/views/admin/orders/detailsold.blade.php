@extends('admin.layouts.master')
@section('title', 'Order Details')

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
                <li class="breadcrumb-item text-muted">Order Details</li>
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

                            <!--end::Svg Icon-->
                            <h2>Order Details</h2>
                            @if($order->status == "completed")
                            <h4 class="badge badge-primary fw-bold mx-3 py-3">{{$order->status}}</h4>
                            @else
                            <h4 class="badge badge-danger fw-bold mx-3 py-3">{{$order->status}}</h4>
                            @endif
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-5">
                        <!--begin::Form-->
                   
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <h4>
                                    Customer Details
                                </h4>
                            
                                <!--end::Label-->
                                <!--begin::Input-->

                                <div class="row">
                                    <div class="col-md-4"><b>Name:</b>
                                        {{ $order->customer->first_name . ' ' . $order->customer->last_name }}
                                    </div>
                                    <div class="col-md-4"><b>Email</b> {{ $order->customer->email }}</div>
                                    <div class="col-md-4"><b>Address</b> {{ $order->customer->address }}</div>
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
                              

                                <!--end::Button-->
                            </div>
                            <!--end::Action buttons-->
                        </form>
                     
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
                                    @endphp
                                    @foreach($services as $service)
                                    <tr>
                                        <td>{{$loop->index}}</td>
                                        <td>{{$service->service->title}}</td>
                                        <td>{{$service->qty}}</td>
                                        <td>{{$service->service->price}}</td>
                                        <td>&#163;{{$service->service->price * $service->qty}}</td>
                                        @php
                                        $total += $service->service->price * $service->qty;
                                        @endphp
                                    </tr>
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

<script>
    $(document).ready(function() {
        $('#services').change(function() {
            var id = $(this).val();
            var html = "<div class='row parent-service'>";
            html += "<div class='col-md-6 text-center mt-3'>";
            html += "<h4>" + $("option:selected", this).text() + "</h4></div>";
            html += "<input type='hidden' name='name[" + id + "]' value='" + $("option:selected", this).text() + "'>";
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
        });

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

    })
</script>
@endpush