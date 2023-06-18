@extends('layouts.app')
@section('title')
    @lang('common.product_edit')
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <a class="btn btn-primary text-white" href="{{ route('product_manage') }}">
                            @lang('common.products')
                        </a>
                    </div>
                    <form class="mt-4" method="POST" action="{{ route('product_edit', ['product' => $product->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">

                            <div class="col-md-7">

                                <div class="form-group {{ $errors->has('product_unit_id') ? 'error' : '' }}">
                                    <label for="" class="form-label"> @lang('common.product')&nbsp;@lang('common.type') <span
                                            class="text-danger">*</span> </label>
                                    <select class="select2 form-control form-select" name="product_unit_id">
                                        <option value=""> @lang('common.select_any_one') </option>
                                        @foreach ($product_units as $product_unit)
                                            <option value="{{ $product_unit->id }}"
                                                @if (old('product_unit_id', $product->product_unit_id) == $product_unit->id) selected @endif> {{ $product_unit->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('product_unit_id')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group {{ $errors->has('product_type_id') ? 'error' : '' }}">
                                    <label for="" class="form-label"> @lang('common.product')&nbsp;@lang('common.type') <span
                                            class="text-danger">*</span> </label>
                                    <select class="select2 form-control form-select" name="product_type_id">
                                        <option value=""> @lang('common.select_any_one') </option>
                                        @foreach ($product_types as $product_type)
                                            <option value="{{ $product_type->id }}"
                                                @if (old('product_type_id', $product->product_type_id) == $product_type->id) selected @endif> {{ $product_type->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('product_type_id')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group {{ $errors->has('product_name') ? 'error' : '' }}">
                                    <label for="" class="form-label"> @lang('common.product')&nbsp;@lang('common.name')
                                        <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" name="product_name" value="{{ old('product_name', $product->product_name) }}"
                                        placeholder="@lang('common.enter_product_name')">
                                    @error('product_name')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group {{ $errors->has('unit_price') ? 'error' : '' }}">
                                   <label for="" class="form-label"> @lang('common.unit_price')
                                       <span class="text-danger">*</span> </label>
                                   <input type="number" class="form-control" name="unit_price" value="{{ old('unit_price', $product->unit_price) }}"
                                       placeholder="@lang('common.enter_unit_price')">
                                   @error('unit_price')
                                       <span class="help-block">{{ $message }}</span>
                                   @enderror
                               </div>

                               <div class="form-group {{ $errors->has('sale_price') ? 'error' : '' }}">
                                   <label for="" class="form-label"> @lang('common.sale_price') </label>
                                   <input type="number" class="form-control" name="sale_price" value="{{ old('sale_price', $product->sale_price) }}"
                                       placeholder="@lang('common.enter_sale_price')">
                                   @error('sale_price')
                                       <span class="help-block">{{ $message }}</span>
                                   @enderror
                               </div>

                                <div class="form-group {{ $errors->has('product_description') ? 'error' : '' }}">
                                    <label for="" class="form-label"> @lang('common.product')&nbsp;@lang('common.description')
                                    </label>
                                    <textarea class="form-control" name="product_description" value="{{ old('product_description', $product->product_description) }}" placeholder="@lang('common.enter_product_description')"></textarea>
                                    @error('product_description')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group {{ $errors->has('status') ? 'error' : '' }}">
                                    <label for="" class="form-label"> @lang('common.status') <span
                                            class="text-danger">*</span>
                                    </label>
                                    <fieldset class="controls">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" value="1"
                                                {{ old('status', $product->status) == '1' ? 'checked' : '' }} name="status"
                                                id="" class="form-check-input">
                                            <label class="form-check-label" for="status"> @lang('common.active') </label>

                                            <input type="radio" value="0"
                                                {{ old('status', $product->status) == '0' ? 'checked' : '' }} name="status" id=""
                                                class="form-check-input">
                                            <label class="form-check-label" for="status"> @lang('common.in_active') </label>
                                        </div>
                                    </fieldset>
                                    @error('status')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-md-5">
                                <label for="input-file-now" class="form-label"> @lang('common.product_image') </label>
                                <input type="file" id="input-file-now" name="thumbnail" class="dropify" />
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary text-white"> @lang('common.update') </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            // Basic
            $('.dropify').dropify();

            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove: 'Supprimer',
                    error: 'Désolé, le fichier trop volumineux'
                }
            });

            // Used events
            var drEvent = $('#input-file-events').dropify();

            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });

            drEvent.on('dropify.errors', function(event, element) {
                console.log('Has Errors');
            });

            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
        });
    </script>
@endsection
