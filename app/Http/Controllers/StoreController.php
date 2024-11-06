<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController
{
    public function index()
    {
        $product = Store::get()->all();
        return view('store.index', ['product' => $product]);
    }

    public function indexApi()
    {
        $products = Store::all(); // You don't need `->get()->all()`, just `->all()`
        return response()->json([
            'success' => true,
            'data' => $products
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $product = Store::where('name', 'LIKE', '%' . $search . '%')->get();

        return view('store.index', compact('product'));
    }
}
