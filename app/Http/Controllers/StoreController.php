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
}
