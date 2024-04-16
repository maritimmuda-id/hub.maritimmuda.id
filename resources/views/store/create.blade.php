@extends('layouts.panel')
@section('content')
    <div class="pt-4">
        <h1 class="d-inline p-4">
            <b><i class="fas fa-edit"></i> @lang('product.singular-name')</b>
        </h1>
    </div>
<div class="px-1 lg:px-10 mx-auto w-full max-w-screen-xl">
    <section class="py-4 px-4">
        <div class="card p-3 mb-0" style="border: none;">
            <h4 class="d-inline pl-4 pt-4">
                <b>@lang('Create :resource', ['resource' => trans('product.singular-name')])</b>
                <div class="card-header-actions pr-4">
                    <a href="{{ route('store.admin.index') }}" class="btn btn-sm btn-secondary">
                        <i class="fas fa-arrow-left"></i>
                        @lang('Back')
                    </a>
                </div>
            </h4>
            <div class="card m-2" style="border: none;">
                <form action="{{ route('store.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="card-body row pb-0">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <label class="form-label">@lang('product.form-label-name')</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name', isset($data) ? $data->first()->name : '') }}" required>
                                </div>
                                <div class="col-md-8 pt-3">
                                    <label  class="form-label">@lang('product.form-label-category')</label>
                                    <input type="text" name="category" class="form-control" value="{{ old('category', isset($data) ? $data->first()->category : '') }}" required>
                                </div>
                                <div class="col-md-8 pt-3">
                                    <label class="form-label">@lang('product.form-label-link')</label>
                                    <input type="text" name="link" class="form-control" value="{{ old('link', isset($data) ? $data->first()->link : '') }}">
                                </div>
                                <div class="col-md-8 pt-3">
                                    <label  class="form-label">@lang('product.form-label-price')</label>
                                    <input type="number" name="price" class="form-control" value="{{ old('price', isset($data) ? $data->first()->price : '') }}" required>
                                </div>
                                <div class="col-md-8 pt-3">
                                    <label  class="form-label">@lang('product.form-label-image')</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                            <div class="card-footer pl-0 pt-5" style="border: none;">
                                <x-save-button href="{{ route('store.admin.index') }}" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
