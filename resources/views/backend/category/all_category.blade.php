@extends('admin_dashboard')


@section('admin')
@section('title')
    All Category | Pencil POS System
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
                            <button type="button" class="btn btn-blue" data-bs-toggle="modal"
                                data-bs-target="#signup-modal">Add Category</button>
                        </ol>
                    </div>
                    <h4 class="page-title">All Category Tables</h4>
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
                                    <th>Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($allCategory as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->category_name }}</td>
                                        <td>
                                            <a href="{{ route('edit#category', $item->id) }}" class="btn btn-info sm"
                                                title="Edit Data"><i class="far fa-edit"></i></a>

                                            <a href="{{ route('delete#category', $item->id) }}"
                                                class="btn btn-danger sm" title="Delete Data" id="delete"><i
                                                    class="fas fa-trash-alt"></i></a>
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


<!-- Signup modal content -->
<div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">

                <form class="px-3" action="{{ route('store#category') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">Category Name</label>
                        <input class="form-control" type="text" id="naem" name="categoryName"
                            placeholder="Add Category">
                    </div>

                    <div class="mb-3 text-center">
                        <button class="btn btn-blue" type="submit">Add</button>
                    </div>

                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection
