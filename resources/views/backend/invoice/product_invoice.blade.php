@extends('admin_dashboard')

@section('admin')
@section('title')
    Order | Pencil POS System
@endsection

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Order List</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Order List</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Logo & title -->
                        <div class="clearfix">
                            <div class="float-start">
                                <div class="auth-logo">
                                    <div class="logo logo-dark">
                                        <span class="logo-lg">
                                            <img src="{{ asset('backend/assets/images/pecnil_textwithlogo.png') }}" alt=""
                                                height="22">
                                        </span>
                                    </div>

                                    <div class="logo logo-light">
                                        <span class="logo-lg">
                                            <img src="{{ asset('backend/assets/images/PencilLogo.png') }}"
                                                alt="" height="22">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="float-end">
                                <h4 class="m-0 d-print-none">Order</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mt-3">
                                    <p><b>Hello, {{ $customer->name }}</b></p>
                                </div>

                            </div><!-- end col -->
                            <div class="col-md-4 offset-md-2">
                                <div class="mt-3 float-end">
                                    <p><strong>Order Date : </strong> <span class="float-end">
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            {{ \Carbon\Carbon::now()->setTimezone('Asia/Yangon')->format('Y-m-d H:i:s') }}
                                        </span></p>

                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row mt-3">
                            <div class="col-sm-6">
                                <h6>Billing Address</h6>
                                <address>
                                    {{ $customer->address }} - {{ $customer->city }}
                                    <br>
                                    <abbr title="Phone">Shop Name:</abbr> {{ $customer->shopname }}<br>
                                    <abbr title="Phone">Phone:</abbr> {{ $customer->phone }}<br>
                                    <abbr title="Phone">Email:</abbr> {{ $customer->email }}
                                </address>
                            </div> <!-- end col -->

                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table mt-4 table-centered">
                                        <thead>
                                            <tr>
                                                <th>Sl</th>
                                                <th>Item</th>
                                                <th style="width: 10%">Qty</th>
                                                <th style="width: 10%">Unit Cost</th>
                                                <th style="width: 10%" class="text-end">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $sl = 1;
                                            @endphp
                                            @foreach ($cartItem as $key => $item)
                                                <tr>
                                                    <td>{{ $sl++ }}</td>
                                                    <td>
                                                        <b>{{ $item->name }}</b> <br />

                                                    </td>
                                                    <td>{{ $item->qty }}</td>
                                                    <td>{{ $item->price }} Ks</td>
                                                    <td class="text-end">{{ $item->price * $item->qty }} Ks</td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div> <!-- end table-responsive -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="clearfix pt-5">
                                    <h6 class="text-muted">မှတ်ချက်: ဝယ်ယူအားပေးမှုကို အထူးကျေးဇူးတင်ပါတယ်။</h6>

                                </div>
                            </div> <!-- end col -->
                            <div class="col-sm-6">
                                <div class="float-end">
                                    <p><b>ကျသင့်ငွေ</b> <span class="float-end" name="sub_total">{{ Cart::subtotal() }}
                                            Ks</span>
                                    </p>

                                    <h3>{{ Cart::total() }} Ks</h3>
                                </div>
                                <div class="clearfix"></div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="mt-4 mb-1">
                            <div class="text-end d-print-none">
                                <button type="button" class="btn btn-blue" data-bs-toggle="modal"
                                    data-bs-target="#signup-modal">ငွေချေရန်</button>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div> <!-- container -->

</div> <!-- content -->

<!-- Signup modal content -->
<div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">

                <div class="text-center mt-2 mb-4">
                    <div class="auth-logo">
                        <h3>Invoice Of {{ $customer->name }}</h3>
                        <h3>Total Amonunt {{ Cart::total() }} Ks</h3>
                    </div>
                </div>


                <form class="px-3" action="{{ url('final-invoice') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">Payment</label>
                        <select name="paymetnStatus" class="form-select mt-3" id="example-select">
                            <option selected disabled>ငွေပေးချေခြင်းပုံစံ ရွေးချယ်ရန်</option>

                            <option value="HandCash">လက်ငင်း</option>
                            <option value="Moblie Payment">Mobile Payment</option>
                            <option value="Due">အကြွေး</option>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">ပေးငွေ</label>
                        <input class="form-control" type="number" id="payNow" name="payNow"
                            placeholder="လက်ခံရရှိငွေ">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">ပြန်အမ်းငွေ</label>
                        <input class="form-control" type="number" id="returnChange" name="returnChange">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">ကျန်ငွေ</label>
                        <input class="form-control" type="number" id="due" name="due">
                    </div>


                    <input type="hidden" name="customerId" value="{{ $customer->id }}">
                    <input type="hidden" name="userId" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="orderDate" value="{{ date('d-F-Y') }}">
                    <input type="hidden" name="orderStaus" value="pending">
                    <input type="hidden" name="porductCount" value="{{ Cart::count() }}">
                    <input type="hidden" name="subTotal" value="{{ Cart::subtotal() }}">
                    <input type="hidden" name="total" value="{{ Cart::total() }}">

                    <div class="mb-3 text-center">
                        <button class="btn btn-blue" type="submit">Complete Order</button>
                    </div>

                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var payNowInput = document.getElementById('payNow');
        var returnChangeInput = document.getElementById('returnChange');
        var dueInput = document.getElementById('due');

        payNowInput.addEventListener('input', function() {
            var total = parseFloat('{{ Cart::total() }}'); // Get the total amount
            var payAmount = parseFloat(payNowInput.value); // Get the pay amount entered by the user
            var returnChange = payAmount - total; // Calculate the return change

            if (!isNaN(returnChange) && returnChange >= 0) {
                returnChangeInput.value = returnChange.toFixed(0); // Display the return change in the input field
                dueInput.value = ''; // Clear the "due" input field if payNow input is greater than or equal to the total amount
            } else {
                returnChangeInput.value = ''; // Clear the input field if the return change is negative or NaN
                dueInput.value = Math.abs(returnChange).toFixed(0); // Calculate and display the due amount in the "due" input field
            }
        });
    });
</script>



@endsection
