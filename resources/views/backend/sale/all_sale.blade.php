@extends('admin_dashboard')


@section('admin')
@section('title')
    Sales | Pencil POS System
@endsection
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        {{-- <ol class="breadcrumb m-0">
                            <a href="{{ route('add#customer') }}"
                                class="btn btn-blue rounded-pill waves-effect waves-light">Add Customer</a>
                        </ol> --}}
                    </div>
                    <h4 class="page-title">Sales</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Cashier Name</th>
                                    <th>Invoice Date</th>
                                    <th>Invoice No</th>
                                    <th>Payment Type</th>
                                    <th>Total</th>
                                    <th>Pay</th>
                                    <th>Return Change</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($sales as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item['user']['name'] }}</td>
                                        <td>{{ $item->invoice_date }}</td>
                                        <td>{{ $item->invoice_no }}</td>
                                        <td>{{ $item->payment_type }}</td>
                                        <td>{{ $item->sub_total }}</td>
                                        <td>{{ $item->accepted_ammount }}</td>
                                        <td>{{ $item->return_change }}</td>
                                        <td>
                                            <a href="{{ route('detail#sale', $item->id) }}" class="btn btn-info sm"
                                                title="Detail Data"><i class="far fa-eye"></i></a>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->


    </div> <!-- container -->

</div> <!-- content -->

@endsection
