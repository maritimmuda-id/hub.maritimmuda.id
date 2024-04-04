@extends('layouts.panel')
@section('content')
<div class="px-4 lg:px-10 mx-auto w-full max-w-screen-xl">
    {{-- Produk --}}
    <section class="py-4 px-4">
        <div class="card p-3 mb-0" style="border: none;">
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('store.create') }}" class="btn btn-sm btn-primary mb-2">
                        <i class="fas fa-plus"></i> Buat
                    </a>
                    <a href="{{ route('store') }}" class="btn btn-sm btn-primary mb-2">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="card p-3 m-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Link Products</th>
                            <th>Image</th> 
                            <th>Action</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product as $item)
                        <tr>
                            <td>{{ $item->name}}</td>
                            <td>{{ $item->category}}</td>
                            <td>{{ $item->price}}</td>
                            <td>{{ $item->link}}</td>
                            <td><img src="{{ asset('media/' . $item->image) }}" alt="Gambar" width="100" height="100"></td>
                            <td>
                                <form action="{{ route('store.edit', $item->id) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-warning mb-2"><i class="fas fa-edit"></i>Edit</button>
                                </form>
                                <form action="{{ route('store.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger mb-2"><i class="fas fa-trash"></i>Delete</button>
                                </form>
                            </td>
                                                   
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection
