@extends('layouts.app')
@section('title')
    @lang('common.product_type_create')
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <a class="btn btn-primary text-white" href="{{ route('product_type_manage') }}">
                            @lang('common.product_types')
                        </a>
                    </div>
                    <form class="mt-4" method="POST" action="{{ route('product_type_create') }}">
                        @csrf

                        <div class="form-group {{ $errors->has('name') ? 'error' : '' }}">
                            <label for="" class="form-label"> @lang('common.product')&nbsp;@lang('common.type') <span
                                    class="text-danger">*</span> </label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                placeholder="@lang('common.enter_product_type_name')">
                            @error('name')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group {{ $errors->has('description') ? 'error' : '' }}">
                            <label for="" class="form-label"> @lang('common.product')&nbsp;@lang('common.type_description') </label>
                            <textarea class="form-control" name="description" value="{{ old('description') }}"
                                placeholder="@lang('common.enter_product_type_description')"></textarea>
                            @error('description')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group {{ $errors->has('status') ? 'error' : '' }}">
                            <label for="" class="form-label"> @lang('common.status') <span class="text-danger">*</span>
                            </label>
                            <fieldset class="controls">
                                <div class="custom-control custom-radio">
                                    <input type="radio" value="1" {{ old('status', 1) == '1' ? 'checked' : '' }}
                                        name="status" id="" class="form-check-input">
                                    <label class="form-check-label" for="status"> @lang('common.active') </label>

                                    <input type="radio" value="0" {{ old('status') == '0' ? 'checked' : '' }}
                                        name="status" id="" class="form-check-input">
                                    <label class="form-check-label" for="status"> @lang('common.in_active') </label>
                                </div>
                            </fieldset>
                            @error('status')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary text-white"> @lang('common.save') </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
