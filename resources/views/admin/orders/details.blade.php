@extends('admin.layouts.master')
@section('title', 'Order Details')
@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Order Details #{{$order->id}}</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Orders</a></li>
                                <li class="breadcrumb-item active">Details</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header bg-gray d-flex justify-content-between align-items-center">
                                            <span>Order Info</span>
                                            @if(empty($order->collected_at) && $order->status == 'uncompleted')
                                            <button class="cancel-order btn btn-sm btn-danger" data-order-id="{{ $order->id }}">Cancel Order</button>
                                            @endif

                                            @php
                                            $orderId = $order->id;
                                            @endphp
                                        </div>
                                        <div class="card-body">
                                            <table class="table order-info-table">
                                                <tbody>
                                                    <tr>
                                                        <th>Status</th>
                                                        <td>
                                                            {{ ucwords($order->status) }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Collection</th>
                                                        <td>{{ date('d.m.Y', strtotime($order->collection_date)); }} => {{ $order->collection_time }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Delivery</th>
                                                        <td>
                                                            {{ date('d.m.Y', strtotime($order->delivery_date)); }} => {{ $order->delivery_time }}

                                                            <br>
                                                            <a href="javascript:void(0);" id="editBtn" class="btn btn-xs btn-primary">
                                                                Edit Date Time
                                                            </a>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Address</th>
                                                        <td>{{ $order->customer->address.' '.$order->customer->address_1.' '.$order->customer->city }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Driver Instructions</th>
                                                        <td>{{ $order->instruction ?? 'N/A' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Special instructions for driver</th>
                                                        <td>{{ $order->infomation ?? 'N/A' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Frequency</th>
                                                        <td>{{ $order->frequency }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <th style="text-align: left !important;">
                                                <div id="editFormContainer" class="mt-3" style="display: none;">
                                                    <h4>Edit Collection/Delivery Date Time</h4>

                                                    <form method="POST" action="{{ route('admin.orders.updateTimings', $order->id) }}">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="mb-3">
                                                            <label for="collection_date" class="form-label">Collection Date:</label>
                                                            <select name="collection_date" id="collection_date"
                                                            class="form-control with-icon">
                                                            <option value="">select</option>
                                                            @if (!in_array(now()->format('D'), $offdays) && !in_array(now()->format('D'), $offdates))
                                                            <option value="{{ now()->toDateString() }}">Today</option>
                                                            @endif
                                                            @if (
                                                                !in_array(now()->addDays(1)->format('D'),
                                                                    $offdays) &&
                                                                !in_array(now()->addDays(1)->format('D'),
                                                                $offdates))
                                                                <option value="{{ now()->addDays(1)->toDateString() }}">Tomorow
                                                                </option>
                                                                @endif
                                                                @php
                                                                $date = now()->addDays(2);
                                                                @endphp
                                                                @for ($i = 1; $i <= 30; $i++)
                                                                @if (count($offdays) > 0)
                                                                @if (!in_array($date->format('D'), $offdays) && !in_array($date->format('Y-m-d'), $offdates))
                                                                <option value="{{ $date->toDateString() }}"
                                                                    @if (!empty($order) && $order->collection_date == $date->toDateString()) selected @endif>
                                                                    {{ $date->format('D, d M') }}</option>
                                                                    @endif
                                                                    @else
                                                                    <option value="{{ $date->toDateString() }}"
                                                                        @if (!empty($order) && $order->delivery_date == $date->toDateString()) selected @endif>
                                                                        {{ $date->format('D, d M') }}</option>
                                                                        @endif
                                                                        @php
                                                                        $date = $date->addDays(1);
                                                                        @endphp
                                                                        @endfor
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="collection_time" class="form-label">Collection Time:</label>

                                                                    <select name="collection_time" class="form-control with-icon">

                                                                        @if (!empty($timings))
                                                                        @foreach ($timings as $timing)
                                                                        <option value="{{ $timing->timing }}"
                                                                            {{ old('collection_time', $order->collection_time ?? '') == $timing->timing ? 'selected' : '' }}>
                                                                            {{ $timing->timing }}</option>
                                                                            @endforeach
                                                                            @endif
                                                                        </select>

                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="delivery_date" class="form-label">Delivery Date:</label>
                                                                        <select name="delivery_date" id="delivery_date"
                                                                        class="form-control with-icon">
                                                                        <option value="">select</option>
                                                                        @if (!in_array(now()->format('D'), $offdays) && !in_array($date->format('Y-m-d'), $offdates))
                                                                        <option value="{{ now()->toDateString() }}">Today</option>
                                                                        @endif
                                                                        @if (
                                                                            !in_array(now()->addDays(1)->format('D'),
                                                                            $offdays) && !in_array($date->format('Y-m-d'), $offdates))
                                                                            <option value="{{ now()->addDays(1)->toDateString() }}">Tomorow
                                                                            </option>
                                                                            @endif
                                                                            @php
                                                                            $date = now()->addDays(2);
                                                                            @endphp

                                                                            @for ($i = 1; $i <= 30; $i++)
                                                                            @if (count($offdays) > 0)
                                                                            @if (!in_array($date->format('D'), $offdays) && !in_array($date->format('Y-m-d'), $offdates))
                                                                            <option value="{{ $date->toDateString() }}"
                                                                                @if (!empty($order) && $order->delivery_date == $date->toDateString()) selected @endif>
                                                                                {{ $date->format('D, d M') }}</option>
                                                                                @endif
                                                                                @else
                                                                                <option value="{{ $date->toDateString() }}"
                                                                                    @if (!empty($order) && $order->delivery_date == $date->toDateString()) selected @endif>
                                                                                    {{ $date->format('D, d M') }}</option>
                                                                                    @endif
                                                                                    @php
                                                                                    $date = $date->addDays(1);
                                                                                    @endphp
                                                                                    @endfor
                                                                                </select>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="delivery_time" class="form-label">Delivery Time:</label>
                                                                                <select name="delivery_time" class="form-control with-icon">
                                                                                    @if (!empty($timings))
                                                                                    @foreach ($timings as $timing)
                                                                                    <option value="{{ $timing->timing }}"
                                                                                        {{ old('delivery_time', $order->delivery_time ?? '') == $timing->timing ? 'selected' : '' }}>
                                                                                        {{ $timing->timing }}</option>
                                                                                        @endforeach
                                                                                        @endif
                                                                                    </select>
                                                                                </div>

                                                                                <button type="submit" class="btn btn-success">Update Order</button>
                                                                                <button type="button" id="cancelBtn" class="btn btn-secondary">Cancel</button>
                                                                            </form>
                                                                        </div>

                                                                    </th>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="card">
                                                                <div class="card-header bg-gray d-flex justify-content-between align-items-center">
                                                                    <span>Customer Info</span>
                                                                </div>
                                                                <div class="card-body">
                                                                    <table class="table order-info-table">
                                                                        <tbody>
                                                                            <tr>
                                                                                <th>Name</th>
                                                                                <td>{{ $order->customer->user->name }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Phone</th>
                                                                                <td>{{ $order->customer->phone_no }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Email</th>
                                                                                <td>{{ $order->customer->user->email }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Total Orders</th>
                                                                                <td> {{ $totalOrders }} </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if($order->status !== 'cancelled')
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="card">
                                                                <div class="card-header bg-gray d-flex justify-content-between align-items-center">
                                                                    <span>Order Timeline</span>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-12 col-lg-4 col-xl-3 pt-2 pt-xl-0 d-flex align-items-center">
                                                                            <span class="flex-ruby @if(!empty($order->collected_at)) text-higlight @endif ">Awaiting collection ></span>
                                                                            <form id="kt_ecommerce_settings_general_form" action="{{ route('admin.order.collected', $order->id) }}" class="form" method="POST">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <button type="submit" class="btn @if(!empty($order->collected_at)) btn-primary disabled  @else btn-success @endif btn-wrap "> Acknowledge Collection </button>
                                                                            </form>
                                                                            <span class="flex-ruby @if(!empty($order->collected_at)) text-higlight @endif"> > </span>
                                                                        </div>
                                                                        <div class="col-12 col-lg-4 col-xl-3 pt-2 pt-xl-0 d-flex align-items-center">
                                                                            <span class="flex-ruby @if($order->payment_status == 'paid') text-higlight @endif ">Awaiting book-in ></span>
                                                                            <form id="kt_ecommerce_settings_general_form" action="{{ route('admin.order.update', $order->id) }}" class="form" method="POST">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <button type="submit" class="btn @if(empty($order->collected_at) || (count($services) < 1)) btn-primary disabled  @elseif($order->payment_status == 'paid') btn-primary disabled @else btn-success @endif btn-wrap "> Acknowledge Book-in </button>
                                                                            </form>
                                                                            <span class="flex-ruby @if(!empty($order->proceed_at)) text-higlight @endif"> > </span>
                                                                        </div>
                                                                        <div class="col-12 col-lg-4 col-xl-3 pt-2 pt-xl-0 d-flex align-items-center">
                                                                            <span class="flex-ruby @if($order->payment_status == 'paid') text-higlight @endif">In progress ></span>
                                                                            <form id="kt_ecommerce_settings_general_form" action="{{ route('admin.order.processed', $order->id) }}" class="form" method="POST">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <button type="submit" class="btn btn-wrap @if($order->payment_status == 'not-paid') btn-primary disabled @elseif(!empty($order->proceed_at)) btn-primary disabled @else btn-success @endif"> Acknowledge Processed </button>
                                                                            </form>
                                                                            <span class="flex-ruby @if(!empty($order->proceed_at)) text-higlight @endif"> > </span>
                                                                        </div>
                                                                        <div class="col-12 col-lg-4 col-xl-3 pt-2 pt-xl-0 d-flex align-items-center">
                                                                            <span class="flex-ruby @if(!empty($order->proceed_at)) text-higlight @endif">Awaiting delivery ></span>
                                                                            <form id="kt_ecommerce_settings_general_form" action="{{ route('admin.order.orderCompleted', $order->id) }}" class="form" method="POST">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <input type="hidden" name="status" value="completed">
                                                                                <button type="submit" class="btn btn-wrap @if(!empty($order->proceed_at) && $order->status == 'processed')  btn-success @else btn-primary disabled @endif"> Acknowledge Delivery </button>
                                                                            </form>
                                                                            <span class="flex-ruby @if(!empty($order->proceed_at) && $order->status == 'completed') text-higlight  @endif">> Completed</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="card">
                                                                <div class="card-header bg-gray d-flex justify-content-between align-items-center">
                                                                    <span>Order Service</span>
                                                                </div>
                                                                <div class="card-body">
                                                                    @if($order->payment_status == "not-paid")
                                                                    <div class="btn-group float-end mb-5">
                                                                        @if($order->status !== 'cancelled')
                                                                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                                            Add Service
                                                                        </button>
                                                                        @endif
                                                                        <ul class="dropdown-menu">
                                                                            @if(!empty($order->collected_at))
                                                                            <li>
                                                                                <form class="px-4 py-3" action="{{ route('admin.order.add_service',$order->id) }}" method="POST" id="serviceForm">
                                                                                    @csrf
                                                                                    <div class="mb-3">
                                                                                        <label for="service_id" class="form-label">Service</label>
                                                                                        <select class="form-select" id="service_id" name="service_id" required>
                                                                                            <option value="">Select</option>
                                                                                            @foreach ($setions as $section)
                                                                                            <optgroup label="{{ $section->name }}">
                                                                                                @foreach ($section->services as $service)
                                                                                                <option value="{{ $service->id }}">{{ $service->title }}</option>
                                                                                                @endforeach
                                                                                            </optgroup>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="mb-3">
                                                                                        <label for="serviceName" class="form-label">Quantity</label>
                                                                                        <input type="number" class="form-control" min='1' value="1" name="qty" placeholder="Quantity" required>
                                                                                    </div>
                                                                                    <button type="submit" class="btn btn-primary">Add</button>
                                                                                </form>
                                                                            </li>
                                                                            @else
                                                                            <li>
                                                                                <p class="mx-2"> Please acknowledge collection before adding services</p>
                                                                            </li>
                                                                            @endif
                                                                        </ul>
                                                                    </div>
                                                                    @endif
                                                                    @if(!empty($services))
                                                                    <h3>Added Service</h3>
                                                                    <div class="fv-row mb-7">
                                                                        <table class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                                                                            <thead>
                                                                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                                                                    <th>#</th>
                                                                                    <th>Service</th>
                                                                                    <th>Quantity</th>
                                                                                    <th>Price</th>
                                                                                    <th>Sub Total</th>
                                                                                </tr>
                                                                            </thead>
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
                                                                                    <td>&#163;{{ number_format($service->service->price, 2) }}</td>
                                                                                    <td>&#163;{{ number_format($service->service->price * $service->qty, 2) }}</td>
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
                                                                                    <td>&#163;{{ number_format($total, 2) }}</td>
                                                                                </tr>
                                                                            </tfoot>
                                                                        </table>
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
                        </div>
                        @endsection
                        @push('scripts')
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
                        <script>

                            document.getElementById('editBtn').addEventListener('click', function() {
                                document.getElementById('editFormContainer').style.display = 'block';
                            });

                            document.getElementById('cancelBtn').addEventListener('click', function() {
                                document.getElementById('editFormContainer').style.display = 'none';
                            });

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

                            $(document).ready(function(){
                                $('.cancel-order').click(function(){
                                    var orderId = $(this).data('order-id');
                                    var confirmed = confirm("Are you sure you want to cancel this order?");
                                    if (confirmed) {
                                        $.ajax({
                                            url: "{{ route('admin.order.cancelOrder', $orderId ) }}",
                                            type: "PUT",
                                            data: {
                                                _token: '{{ csrf_token() }}'
                                            },
                                            success:function(response) {
                                                window.location.reload();
                                            },
                                            error:function(xhr, textStatus, thrownError){
                                                alert('Error:', thrownError);
                                            }
                                        });
                                    }
                                });
                            });

                        </script>
                        @endpush