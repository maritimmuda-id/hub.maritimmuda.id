@extends('layouts.panel')
@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<div class="px-4 lg:px-10 mx-auto w-full max-w-screen-xl">
    <section class="py-4 px-4">
        <div class="card p-3 mb-0" style="border: none;">
            <div class="card-header" style="border: none;">
                <h4 class="d-inline pb-3">
                    <b>Tambah Data</b>
                </h4>
            </div>
            <div class="card p-3 m-3">
                <form action="{{ isset($data) ? route('store.update', $data->first()->id) : route('store.admin.index') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($data))
                         @method('PUT')
                    @endif
                    <div class="card-body row pb-0">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name', isset($data) ? $data->first()->name : '') }}" required>
                                </div>
                                <div class="col-md-8">
                                    <label  class="form-label">Category</label>
                                    <input type="text" name="category" class="form-control" value="{{ old('category', isset($data) ? $data->first()->category : '') }}" required>
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label">Link Product</label>
                                    <input type="text" name="link" class="form-control" value="{{ old('link', isset($data) ? $data->first()->link : '') }}">
                                </div>
                                <div class="col-md-8">
                                    <label  class="form-label">Price</label>
                                    <input type="number" name="price" class="form-control" value="{{ old('price', isset($data) ? $data->first()->price : '') }}" required>
                                </div>
                                <div class="col-md-8">
                                    <label  class="form-label">Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="col-md-8 mt-2">
                                    <button  class="btn btn-primary">Save</button>
                                    <a  href="{{ route('store.admin.index') }}" class="btn btn-dark">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
