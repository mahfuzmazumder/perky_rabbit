@extends('layouts.app')
@section('title')
    @lang('common.all_products')
@endsection

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-success alert-rounded alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert" class="btn-close"aria-label="Close"> <span
                    aria-hidden="true"></span> </button>
            {{ Session::get('message') }}
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <a class="btn btn-primary text-white" href="{{ route('product_create') }}">
                            @lang('common.add_product')
                        </a>
                    </div>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-striped border">
                            <thead>
                                <tr>
                                    <th> @lang('common.sl') </th>
                                    <th> @lang('common.type') </th>
                                    <th> @lang('common.name') </th>
                                    <th> @lang('common.sale_price') </th>
                                    <th> @lang('common.product_image') </th>
                                    <th> @lang('common.status') </th>
                                    <th> @lang('common.action') </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>
                                        <td> {{ $product->type->name ?? '' }} </td>
                                        <td> {{ $product->product_name ?? '' }} </td>
                                        <td> {{ $product->sale_price ?? '' }} </td>
                                        <td>
                                             <img src="{{ URL($product->thumbnail ?? '') }}" alt="@lang('common.product_image')" height="20" width="30">
                                        </td>
                                        <td>
                                            @php
                                                if ($product->status == 1) {
                                                    $status ='<span class="label label-success">'.trans('common.active').'</span>';
                                                } else {
                                                    $status ='<span class="label label-danger">'.trans('common.in_active').'</span>';
                                                }
                                                echo $status;
                                            @endphp
                                        </td>
                                        <td>
                                            <a href="{{ route('product_edit', ['product' => $product->id]) }}" class="btn btn-primary btn-sm btn-edit">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <a href="{{ route('product_delete', ['product' => $product->id]) }}" class="btn btn-primary btn-sm btn-edit">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- This is data table -->
    <script src="{{ asset('/assets/template/node_modules/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/assets/template/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js') }}"></script>

    <script>
        $(function() {
            $('#myTable').DataTable();
        });
    </script>
@endsection
