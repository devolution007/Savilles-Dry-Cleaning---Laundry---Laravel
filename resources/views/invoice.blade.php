<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>
    <base href="" />
    <title>Savilles Invoice</title>
    <meta charset="utf-8" />


    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Vendor Stylesheets(used for this page only)-->

    <link href="{{asset('public/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{asset('public/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<div class="container">
    <section class="card p-3">
        <div class="card-body">
            <!-- Invoice Company Details -->
            <div id="invoice-company-details" class="row">
                <div class="col-md-12 col-sm-12 text-center">
                    <div class="media">
                        <!-- Generator: Adobe Illustrator 22.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                        <img alt="Savilles Icon" src="{{ asset('public/front/images/logo.png') }}">


                    </div>
                </div>

            </div>
            <!--/ Invoice Company Details -->
            <!-- Invoice Customer Details -->
            <div id="invoice-customer-details" class="row pt-2">


                <div class="col-md-6 col-sm-12">
                    <p>
                        <span class="text-muted">Customer Name :</span> {{$order->customer->first_name.' '.$order->last_name}}
                    </p>
                    <p>
                        <span class="text-muted">Order Date :</span> {{$order->created_at->toDateString()}}
                    </p>

                </div>
            </div>
            <!--/ Invoice Customer Details -->
            <!-- Invoice Items Details -->
            <div id="invoice-items-details" class="pt-2">
                <div class="row">
                    <div class="table-responsive col-sm-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Service</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $total = 0;
                                @endphp
                                @foreach($services as $service)
                                <tr>
                                    <td>{{$loop->index}}</td>
                                    <td>{{$service->service->title}}</td>
                                    <td>{{$service->qty}}</td>
                                    <td>&#163;{{$service->service->price}}</td>
                                    <td>&#163;{{$service->service->price * $service->qty}}</td>
                                    @php
                                    $total += $service->service->price * $service->qty;
                                    @endphp
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">

                    <div class="offset-8 col-md-5 col-sm-12 float-right">
                        <p class="lead">Total due</p>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="text-bold-800">Total</td>
                                        <td class="text-bold-800 text-right">{{$total}}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Invoice Footer -->
            <div id="invoice-footer">
                <div class="row">
                    <div class="col-md-12 col-sm-12">

                        <p>We appreciate your business and look forward to serving you again in the future.</p>
                    </div>
                    <div class="col-md-12 col-sm-12">

                        <button type="button" class="btn btn-primary btn-lg my-1" onclick="window.print()"><i class="fa fa-paper-plane-o"></i>Print</button>
                    </div>

                </div>
            </div>
            <!--/ Invoice Footer -->
        </div>
    </section>
</div>

</html>