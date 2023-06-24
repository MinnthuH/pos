@extends('admin_dashboard')

@section('admin')
@section('title')
    Add Porduct | Pencil POS System
@endsection
{{-- jquery link  --}}
<script src="{{ asset('backend/assets/jquery.js') }}"></script>
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">

                    </div>
                    <h4 class="page-title">Add Product</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <div class="col-lg-8 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-pane" id="settings">
                            <form id="myForm" method="post" action="{{ route('stroe#porduct') }}" enctype="multipart/form-data">
                                @csrf

                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Add Product
                                </h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="firstname" class="form-label">Product Name</label>
                                            <input type="text" name="productName" class="form-control">
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="firstname" class="form-label">Category</label>
                                            <select name="categoryId" class="form-select" id="example-select">
                                                <option selected disabled>Select Category</option>
                                                @foreach ($category as $item)
                                                    <option value="{{ $item->id }}">{{ $item->category_name }}
                                                    </option>
                                                @endforeach

                                            </select>

                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="firstname" class="form-label">Supplier</label>
                                            <select name="supplierId" class="form-select" id="example-select">
                                                <option selected disabled>Select Supplier</option>
                                                @foreach ($supplier as $sup)
                                                    <option value="{{ $sup->id }}">{{ $sup->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    {{-- <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="firstname" class="form-label">Product Code</label>
                                            <input type="text" name="productCode" class="form-control">
                                        </div>
                                    </div> --}}
                                    <!-- end col -->
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="firstname" class="form-label">Product Garage</label>
                                            <input type="text" name="productGarage" class="form-control">
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="firstname" class="form-label">Product Store</label>
                                            <input type="text" name="productStore" class="form-control">
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="firstname" class="form-label">Buying Date</label>
                                            <input type="date" name="buyingDate" class="form-control">
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="firstname" class="form-label">Expire Date</label>
                                            <input type="date" name="expireDate" class="form-control">
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="firstname" class="form-label">Buying Price</label>
                                            <input type="text" name="buyingPrice" class="form-control">
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="firstname" class="form-label">Selling Price</label>
                                            <input type="text" name="sellingPrice" class="form-control">
                                        </div>
                                    </div>
                                    <!-- end col -->

                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label for="lastname" class="form-label">Porduct Image</label>
                                            <input type="file" id="image" name="productImage"
                                                class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <img id="showImage" src="{{ url('upload/no_image.jpg') }}"
                                                class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                        </div>
                                    </div> <!-- end col -->

                                </div> <!-- end row -->

                                <div class="text-end">
                                    <button type="submit" class="btn btn-blue waves-effect waves-light mt-2"><i
                                            class="mdi mdi-content-save"></i> Save</button>
                                </div>
                            </form>
                        </div>
                        <!-- end settings content-->

                    </div>
                </div> <!-- end card-->

            </div> <!-- end col -->
        </div>
        <!-- end row-->

    </div> <!-- container -->

</div> <!-- content -->

<script type="text/javascript">
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                productName: {
                    required : true,
                },
                categoryId: {
                    required : true,
                },
                supplierId: {
                    required : true,
                },

                productGarage: {
                    required : true,
                },
                productStore: {
                    required : true,
                },
                buyingDate: {
                    required : true,
                },
                expireDate: {
                    required : true,
                },
                buyingPrice: {
                    required : true,
                },
                sellingPrice: {
                    required : true,
                },
                productImage: {
                    required : true,
                },
            },
            messages :{
                productName: {
                    required : 'Please Enter Product Name',
                },
                categoryId: {
                    required : 'Please Select Category',
                },
                supplierId: {
                    required : 'Please Select Supplier',
                },
                productGarage: {
                    required : 'Please Enter Product Garage',
                },
                productStore: {
                    required : 'Please Enter Product Store',
                },
                buyingDate: {
                    required : 'Please Enter Buying Date',
                },
                expireDate: {
                    required : 'Please Enter Expire Date',
                },
                buyingPrice: {
                    required : 'Please Enter Buying Price',
                },
                sellingPrice: {
                    required : 'Please Enter Selling Price',
                },
                productImage: {
                    required : 'Please Enter Product Image',
                },

            },
            errorElement : 'span',
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });

</script>




@endsection
