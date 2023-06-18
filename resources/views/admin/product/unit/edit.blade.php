@extends('layouts.app')
@section('title')
    @lang('common.product_unit_edit')
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
                        <a class="btn btn-primary text-white" href="{{ route('product_units_manage') }}">
                            @lang('common.product_units')
                        </a>
                    </div>
                    <form class="mt-4" method="POST" action="{{ route('product_unit_edit', ['product_unit' => $product_unit->id]) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group {{ $errors->has('name') ? 'error' : '' }}">
                            <label for="" class="form-label"> @lang('common.product')&nbsp;@lang('common.unit') <span
                                    class="text-danger">*</span> </label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $product_unit->name) }}"
                                placeholder="@lang('common.enter_product_unit')">
                            @error('name')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group {{ $errors->has('status') ? 'error' : '' }}">
                            <label for="" class="form-label"> @lang('common.status') <span class="text-danger">*</span>
                            </label>
                            <fieldset class="controls">
                                <div class="custom-control custom-radio">
                                    <input type="radio" value="1" {{ old('status', $product_unit->status) == '1' ? 'checked' : '' }}
                                        name="status" id="" class="form-check-input">
                                    <label class="form-check-label" for="status"> @lang('common.active') </label>

                                    <input type="radio" value="0" {{ old('status', $product_unit->status) == '0' ? 'checked' : '' }}
                                        name="status" id="" class="form-check-input">
                                    <label class="form-check-label" for="status"> @lang('common.in_active') </label>
                                </div>
                            </fieldset>
                            @error('status')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary text-white"> @lang('common.update') </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
