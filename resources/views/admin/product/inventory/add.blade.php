@extends('layouts.app')
@section('title')
    @lang('common.add_product_inventory')
@endsection
@section('product', 'collapse')
@section('product_unit', 'collapse')

@section('link')

@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        @lang('common.inventory_item')
                    </h4>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-striped border">
                            <thead>
                                <tr>
                                    <th> @lang('common.type') <span class="text-danger">*</span> </th>
                                    <th> @lang('common.item') <span class="text-danger">*</span> </th>
                                    <th> @lang('common.add_amount') <span class="text-danger">*</span> </th>
                                    <th> @lang('common.present_amount') </th>
                                    <th> @lang('common.update') </th>
                                </tr>
                            </thead>
                            <tbody id="item-container">
                                <tr class="items">

                                    <td>
                                        <div class="form-group">
                                            <select class="select2 form-control form-select product_type_id"
                                                name="product_type_id[]">
                                                <option value=""> @lang('common.select_any_one') </option>
                                                @foreach ($product_types as $product_type)
                                                    <option value="{{ $product_type->id }}"
                                                        @if (old('product_type_id') == $product_type->id) selected @endif>
                                                        {{ $product_type->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="form-group">
                                            <select class="select2 form-control form-select product_id" name="product_id[]">
                                                <option value=""> @lang('common.select_any_one') </option>
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}"
                                                        @if (old('product_id') == $product->id) selected @endif>
                                                        {{ $product->product_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="form-group">
                                            <input type="text" name="add_amount[]" class="form-control add_amount"
                                                placeholder="@lang('common.enter_product_amount')">
                                        </div>
                                    </td>

                                    <td>
                                        <div class="form-group">
                                            <input type="text" readonly name="present_amount" class="form-control present_amount" value="0">
                                        </div>
                                    </td>

                                    <td></td>

                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="5" class="text-end">
                                        <button type="button" class="btn btn-outline-primary add_more">
                                            <i class="fas fa-plus-circle"></i> @lang('common.add_item')
                                        </button>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="text-center">
                    <button type="button" class="btn btn-primary">
                        <i class="far fa-file-alt"></i> @lang('common.save')
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Template -->
    <template id="item-template">
        <tr class="items">

            <td>
                <div class="form-group">
                    <select class="select2 form-control form-select product_type_id" name="product_type_id[]">
                        <option value=""> @lang('common.select_any_one') </option>
                        @foreach ($product_types as $product_type)
                            <option value="{{ $product_type->id }}" @if (old('product_type_id') == $product_type->id) selected @endif>
                                {{ $product_type->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </td>

            <td>
                <div class="form-group">
                    <select class="select2 form-control form-select" name="product_id[]">
                        <option value=""> @lang('common.select_any_one') </option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" @if (old('product_id') == $product->id) selected @endif>
                                {{ $product->product_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </td>

            <td>
                <div class="form-group">
                    <input type="text" name="add_amount[]" class="form-control add_amount" placeholder="@lang('common.enter_product_amount')">
                </div>
            </td>

            <td>
                <div class="form-group">
                    <input type="text" readonly name="present_amount" class="form-control present_amount" value="0">
                </div>
            </td>

            <td>
                <button type="button" class="btn btn-primary remove_item">
                    <i class="far fa-window-close"></i> @lang('common.cancel')
                </button>
            </td>

        </tr>
    </template>
@endsection

@section('script')
    <!-- select2 -->
    <script src="{{ asset('/assets/template/node_modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('/assets/template/node_modules/bootstrap-select/bootstrap-select.min.js') }}"></script>

    <script>
        $(function() {
            $(".select2").select2();

            // add item
            $('body').on('click', '.add_more', function() {
                var html = $('#item-template').html();
                var variant = $(html);
                $('#item-container').append(variant);
                $('.select2').select2();
            })
            // remove item
            $('body').on('click', '.remove_item', function() {
                $(this).closest('.items').remove();
            })

            //
            $('body').on('change', '.product_id', function() {
                var product_id = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "{{ route('get_product_info') }}",
                    data: {
                        id: product_id
                    },
                    success: function(data) {
                        console.log(data);
                        let {product, quantity} = data;
                        //$('.present_amount').val(quantity);
                        let t = $(this);
                        let tr = t.closest('tr').find('.present_amount');
                        console.log(tr);
                    }
                });
            })

        });
    </script>
@endsection
