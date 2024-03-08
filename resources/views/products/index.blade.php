@extends('layouts.panel')
@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<div class="px-4 lg:px-10 mx-auto w-full max-w-screen-xl">
    {{-- Produk --}}
    <section class="py-4 px-4">
        <div class="card p-3 mb-0" style="border: none;">
            <div class="col-md-8 mt-2">
                <a href="{{ route('product.create') }}" class="btn btn-sm btn-primary mb-2">
                <i class="fas fa-plus"></i> Create</a>
            </div>
            <div class="card p-3 m-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Stock</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    <thead>
                    <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td>{{ $item->name}}</td>
                            <td>{{ $item->stock}}</td>
                            <td>{{ $item->price}}</td>
                            <td>{{ $item->description}}</td>
                            <td>{{ $item->category}}</td>
                            <td><img src="asset{{('media/'.$item->image)}}" alt="Gambar"></td>
                            <td>
                                <form action="{{ route('product.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?')">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('product.edit',$item->id) }}" class="btn btn-sm btn-warning mb-2"><i class="fas fa-edit"></i> Edit</a>
                                    <button class="btn btn-sm btn-danger mb-2"><i class="fas fa-trash-alt"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection