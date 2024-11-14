@extends('admin.layouts.master')

@section('content')
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col">

                    <div class="h-100">
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Today's  Orders</p>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <h5 class="text-success fs-14 mb-0">
                                                    <!-- <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +16.24 % -->
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-4">
                                            <div>
                                                <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="{{ $totalTodayOrder }}">0</span> </h4>
                                                <a href="{{ route('admin.order.today') }}" class="text-decoration-underline">View all orders</a>
                                            </div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-success rounded fs-3">
                                                    <i class="bx bx-dollar-circle text-success"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Pending Orders</p>
                                            </div>
                                            <!-- <div class="flex-shrink-0">
                                                <h5 class="text-danger fs-14 mb-0">
                                                    <i class="ri-arrow-right-down-line fs-13 align-middle"></i> -3.57 %
                                                </h5>
                                            </div> -->
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-4">
                                            <div>
                                                <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="{{ $totalPendingOrder }}">0</span></h4>
                                                <a href="{{ route('admin.order.pending') }}" class="text-decoration-underline">View all orders</a>
                                            </div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-info rounded fs-3">
                                                    <i class="bx bx-shopping-bag text-info"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="text-uppercase fw-medium text-muted text-truncate mb-0">On Going Orders</p>
                                            </div>
                                            <!-- <div class="flex-shrink-0">
                                                <h5 class="text-success fs-14 mb-0">
                                                    <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +29.08 %
                                                </h5>
                                            </div> -->
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-4">
                                            <div>
                                                <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="{{ $totalOnGoingOrders }}">0</span></h4>
                                                <a href="{{ route('admin.order.ongoing') }}" class="text-decoration-underline">View all orders</a>
                                            </div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-warning rounded fs-3">
                                                    <i class="bx bx-user-circle text-warning"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> On The Way Orders</p>
                                            </div>
                                            <!-- <div class="flex-shrink-0">
                                                <h5 class="text-muted fs-14 mb-0">
                                                    +0.00 %
                                                </h5>
                                            </div> -->
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-4">
                                            <div>
                                                <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="{{ $totalOnTheWayOrders }}">0</span> </h4>
                                                <a href="{{ route('admin.order.ontheway') }}" class="text-decoration-underline">View all orders</a>
                                            </div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-primary rounded fs-3">
                                                    <i class="bx bx-wallet text-primary"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Delivered Orders</p>
                                            </div>
                                            <!-- <div class="flex-shrink-0">
                                                <h5 class="text-muted fs-14 mb-0">
                                                    +0.00 %
                                                </h5>
                                            </div> -->
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-4">
                                            <div>
                                                <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="{{ $totalDeliveredOrders }}">0</span> </h4>
                                                <a href="{{ route('admin.order.delivered') }}" class="text-decoration-underline">View all orders</a>
                                            </div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-primary rounded fs-3">
                                                    <i class="bx bx-wallet text-primary"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Completed Orders</p>
                                            </div>
                                            <!-- <div class="flex-shrink-0">
                                                <h5 class="text-muted fs-14 mb-0">
                                                    +0.00 %
                                                </h5>
                                            </div> -->
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-4">
                                            <div>
                                                <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="{{ $totalComplateOrder }}">0</span> </h4>
                                                <a href="{{ route('admin.order.completed') }}" class="text-decoration-underline">View all orders</a>
                                            </div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-primary rounded fs-3">
                                                    <i class="bx bx-wallet text-primary"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Total Not Paid Amount</p>
                                            </div>
                                            <!-- <div class="flex-shrink-0">
                                                <h5 class="text-muted fs-14 mb-0">
                                                    +0.00 %
                                                </h5>
                                            </div> -->
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-4">
                                            <div>
                                                <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="0">0</span> </h4>
                                                <a href="#" class="text-decoration-underline">View all orders</a>
                                            </div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-primary rounded fs-3">
                                                    <i class="bx bx-wallet text-primary"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Total Earning</p>
                                            </div>
                                            <!-- <div class="flex-shrink-0">
                                                <h5 class="text-muted fs-14 mb-0">
                                                    +0.00 %
                                                </h5>
                                            </div> -->
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-4">
                                            <div>
                                                <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="0">0</span> </h4>
                                                <a href="#" class="text-decoration-underline">View all orders</a>
                                            </div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-primary rounded fs-3">
                                                    <i class="bx bx-wallet text-primary"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            
                        </div> <!-- end row-->

                        <div class="row">
                        <div class="col-xl-6">
                        <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Pending Orders</h4>
                                        
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <div class="table-responsive table-card">
                                            <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                                <thead class="text-muted table-light">
                                                    <tr>
                                                        <th scope="col">Order ID</th>
                                                        <th scope="col">Customer</th>
                                                        <th scope="col">Product</th>
                                                        <th scope="col">Amount</th>
                                                        <th scope="col">Vendor</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Rating</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <a href="apps-ecommerce-order-details.html" class="fw-medium link-primary">#VZ2112</a>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 me-2">
                                                                    <img src="assets/images/users/avatar-1.jpg" alt="" class="avatar-xs rounded-circle" />
                                                                </div>
                                                                <div class="flex-grow-1">Alex Smith</div>
                                                            </div>
                                                        </td>
                                                        <td>Clothes</td>
                                                        <td>
                                                            <span class="text-success">$109.00</span>
                                                        </td>
                                                        <td>Zoetic Fashion</td>
                                                        <td>
                                                            <span class="badge badge-soft-success">Paid</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 fw-medium mb-0">5.0<span class="text-muted fs-11 ms-1">(61 votes)</span></h5>
                                                        </td>
                                                    </tr><!-- end tr -->
                                                    <tr>
                                                        <td>
                                                            <a href="apps-ecommerce-order-details.html" class="fw-medium link-primary">#VZ2111</a>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 me-2">
                                                                    <img src="assets/images/users/avatar-2.jpg" alt="" class="avatar-xs rounded-circle" />
                                                                </div>
                                                                <div class="flex-grow-1">Jansh Brown</div>
                                                            </div>
                                                        </td>
                                                        <td>Kitchen Storage</td>
                                                        <td>
                                                            <span class="text-success">$149.00</span>
                                                        </td>
                                                        <td>Micro Design</td>
                                                        <td>
                                                            <span class="badge badge-soft-warning">Pending</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 fw-medium mb-0">4.5<span class="text-muted fs-11 ms-1">(61 votes)</span></h5>
                                                        </td>
                                                    </tr><!-- end tr -->
                                                    <tr>
                                                        <td>
                                                            <a href="apps-ecommerce-order-details.html" class="fw-medium link-primary">#VZ2109</a>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 me-2">
                                                                    <img src="assets/images/users/avatar-3.jpg" alt="" class="avatar-xs rounded-circle" />
                                                                </div>
                                                                <div class="flex-grow-1">Ayaan Bowen</div>
                                                            </div>
                                                        </td>
                                                        <td>Bike Accessories</td>
                                                        <td>
                                                            <span class="text-success">$215.00</span>
                                                        </td>
                                                        <td>Nesta Technologies</td>
                                                        <td>
                                                            <span class="badge badge-soft-success">Paid</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 fw-medium mb-0">4.9<span class="text-muted fs-11 ms-1">(89 votes)</span></h5>
                                                        </td>
                                                    </tr><!-- end tr -->
                                                    <tr>
                                                        <td>
                                                            <a href="apps-ecommerce-order-details.html" class="fw-medium link-primary">#VZ2108</a>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 me-2">
                                                                    <img src="assets/images/users/avatar-4.jpg" alt="" class="avatar-xs rounded-circle" />
                                                                </div>
                                                                <div class="flex-grow-1">Prezy Mark</div>
                                                            </div>
                                                        </td>
                                                        <td>Furniture</td>
                                                        <td>
                                                            <span class="text-success">$199.00</span>
                                                        </td>
                                                        <td>Syntyce Solutions</td>
                                                        <td>
                                                            <span class="badge badge-soft-danger">Unpaid</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 fw-medium mb-0">4.3<span class="text-muted fs-11 ms-1">(47 votes)</span></h5>
                                                        </td>
                                                    </tr><!-- end tr -->
                                                    <tr>
                                                        <td>
                                                            <a href="apps-ecommerce-order-details.html" class="fw-medium link-primary">#VZ2107</a>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 me-2">
                                                                    <img src="assets/images/users/avatar-6.jpg" alt="" class="avatar-xs rounded-circle" />
                                                                </div>
                                                                <div class="flex-grow-1">Vihan Hudda</div>
                                                            </div>
                                                        </td>
                                                        <td>Bags and Wallets</td>
                                                        <td>
                                                            <span class="text-success">$330.00</span>
                                                        </td>
                                                        <td>iTest Factory</td>
                                                        <td>
                                                            <span class="badge badge-soft-success">Paid</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 fw-medium mb-0">4.7<span class="text-muted fs-11 ms-1">(161 votes)</span></h5>
                                                        </td>
                                                    </tr><!-- end tr -->
                                                </tbody><!-- end tbody -->
                                            </table><!-- end table -->
                                        </div>
                                    </div>
                                </div> <!-- .card-->
                        </div>
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Recent Completed  Orders</h4>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <div class="table-responsive table-card">
                                            <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                                <thead class="text-muted table-light">
                                                    <tr>
                                                        <th scope="col">Order ID</th>
                                                        <th scope="col">Customer</th>
                                                        <th scope="col">Product</th>
                                                        <th scope="col">Amount</th>
                                                        <th scope="col">Vendor</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Rating</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <a href="apps-ecommerce-order-details.html" class="fw-medium link-primary">#VZ2112</a>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 me-2">
                                                                    <img src="assets/images/users/avatar-1.jpg" alt="" class="avatar-xs rounded-circle" />
                                                                </div>
                                                                <div class="flex-grow-1">Alex Smith</div>
                                                            </div>
                                                        </td>
                                                        <td>Clothes</td>
                                                        <td>
                                                            <span class="text-success">$109.00</span>
                                                        </td>
                                                        <td>Zoetic Fashion</td>
                                                        <td>
                                                            <span class="badge badge-soft-success">Paid</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 fw-medium mb-0">5.0<span class="text-muted fs-11 ms-1">(61 votes)</span></h5>
                                                        </td>
                                                    </tr><!-- end tr -->
                                                    <tr>
                                                        <td>
                                                            <a href="apps-ecommerce-order-details.html" class="fw-medium link-primary">#VZ2111</a>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 me-2">
                                                                    <img src="assets/images/users/avatar-2.jpg" alt="" class="avatar-xs rounded-circle" />
                                                                </div>
                                                                <div class="flex-grow-1">Jansh Brown</div>
                                                            </div>
                                                        </td>
                                                        <td>Kitchen Storage</td>
                                                        <td>
                                                            <span class="text-success">$149.00</span>
                                                        </td>
                                                        <td>Micro Design</td>
                                                        <td>
                                                            <span class="badge badge-soft-warning">Pending</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 fw-medium mb-0">4.5<span class="text-muted fs-11 ms-1">(61 votes)</span></h5>
                                                        </td>
                                                    </tr><!-- end tr -->
                                                    <tr>
                                                        <td>
                                                            <a href="apps-ecommerce-order-details.html" class="fw-medium link-primary">#VZ2109</a>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 me-2">
                                                                    <img src="assets/images/users/avatar-3.jpg" alt="" class="avatar-xs rounded-circle" />
                                                                </div>
                                                                <div class="flex-grow-1">Ayaan Bowen</div>
                                                            </div>
                                                        </td>
                                                        <td>Bike Accessories</td>
                                                        <td>
                                                            <span class="text-success">$215.00</span>
                                                        </td>
                                                        <td>Nesta Technologies</td>
                                                        <td>
                                                            <span class="badge badge-soft-success">Paid</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 fw-medium mb-0">4.9<span class="text-muted fs-11 ms-1">(89 votes)</span></h5>
                                                        </td>
                                                    </tr><!-- end tr -->
                                                    <tr>
                                                        <td>
                                                            <a href="apps-ecommerce-order-details.html" class="fw-medium link-primary">#VZ2108</a>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 me-2">
                                                                    <img src="assets/images/users/avatar-4.jpg" alt="" class="avatar-xs rounded-circle" />
                                                                </div>
                                                                <div class="flex-grow-1">Prezy Mark</div>
                                                            </div>
                                                        </td>
                                                        <td>Furniture</td>
                                                        <td>
                                                            <span class="text-success">$199.00</span>
                                                        </td>
                                                        <td>Syntyce Solutions</td>
                                                        <td>
                                                            <span class="badge badge-soft-danger">Unpaid</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 fw-medium mb-0">4.3<span class="text-muted fs-11 ms-1">(47 votes)</span></h5>
                                                        </td>
                                                    </tr><!-- end tr -->
                                                    <tr>
                                                        <td>
                                                            <a href="apps-ecommerce-order-details.html" class="fw-medium link-primary">#VZ2107</a>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 me-2">
                                                                    <img src="assets/images/users/avatar-6.jpg" alt="" class="avatar-xs rounded-circle" />
                                                                </div>
                                                                <div class="flex-grow-1">Vihan Hudda</div>
                                                            </div>
                                                        </td>
                                                        <td>Bags and Wallets</td>
                                                        <td>
                                                            <span class="text-success">$330.00</span>
                                                        </td>
                                                        <td>iTest Factory</td>
                                                        <td>
                                                            <span class="badge badge-soft-success">Paid</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 fw-medium mb-0">4.7<span class="text-muted fs-11 ms-1">(161 votes)</span></h5>
                                                        </td>
                                                    </tr><!-- end tr -->
                                                </tbody><!-- end tbody -->
                                            </table><!-- end table -->
                                        </div>
                                    </div>
                                </div> <!-- .card-->
                            </div> <!-- .col-->
                        </div>
                    </div> <!-- end .h-100-->
                </div> <!-- end col -->
            </div>
        </div>
        <!-- container-fluid -->
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
<!-- end main content-->
@endsection