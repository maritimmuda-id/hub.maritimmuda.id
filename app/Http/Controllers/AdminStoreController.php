<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminStoreController
{
    public function index()
    {
        $product = Store::get()->all();
        return view('store.admin', ['product' => $product]);
    }

    public function create()
    {
        $method="post";
        $action="store.admin";
        return view("store.create",compact("method","action"));
    }

    public function store(Request $request)
    {
        $path=$request->file('image')->store('','public');
        $product=Store::create([
            'name'=>$request->name,
            'link'=>$request->link,
            'price'=>$request->price,
            'category'=>$request->category,
            'image'=>$path
        ]);
        session()->flash('success', 'Product has been added successfully.');
        return redirect()->route("store.admin.index");
    }

    public function edit($id)
    {
        $product = Store::findOrFail($id);
        return view('store.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Store::findOrFail($id);

        $product->name = $request->name;
        $product->link = $request->link;
        $product->price = $request->price;
        $product->category = $request->category;

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($product->image);

            $path = $request->file('image')->store('', 'public');
            $product->image = $path;
        }

        $product->save();

        session()->flash('success', 'Product has been updated successfully.');
        return redirect()->route('store.admin.index');
    }

    public function destroy($id)
    {
        Store::destroy($id);
        session()->flash('success', 'Product has been deleted successfully.');
        return redirect()->route("store.admin.index");
    }
}
