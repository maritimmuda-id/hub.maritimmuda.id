@extends('layouts.panel')
@section('content')
<div class="px-4 lg:px-10 mx-auto w-full max-w-screen-xl">
    <section class="py-4 px-4">
        <div class="card p-3 mb-0" style="border: none;">
            <div class="card-header" style="border: none;">
                <h4 class="d-inline pb-3">
                    <b>Edit Data</b>
                </h4>
            </div>
            <div class="card p-3 m-3">
                <form action="{{ route('store.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body row pb-0">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label">Category</label>
                                    <input type="text" name="category" class="form-control" value="{{ old('category', $product->category) }}" required>
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label">Link Product</label>
                                    <input type="text" name="link" class="form-control" value="{{ old('link', $product->link) }}">
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label">Price</label>
                                    <input type="number" name="price" class="form-control" value="{{ old('price', $product->price) }}" required>
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label">Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="col-md-8 mt-2">
                                    <button class="btn btn-primary">Update</button>
                                    <a href="{{ route('store.admin.index') }}" class="btn btn-dark">Cancel</a>
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
