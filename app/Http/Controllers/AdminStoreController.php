<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

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
        return view("store.create-or-edit",compact("method","action"));
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
        $product = Store::where('id', $id)->first();
        return view('store.create-or-edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $data=Store::findorfail($id);

        $image=$request->image;
        if(isset($image)){
            $path=$request->file('image')->store('','public');
            $update_image=[
                'image'=>$path
            ];
            $data->update($update_image);
        }

        $product=[
            'name'=>$request->name,
            'link'=>$request->link,
            'price'=>$request->price,
            'category'=>$request->category,
        ];
        $data->update($product);
        session()->flash('success', 'Product has been updated successfully.');
        return redirect()->route("store.admin.index");

    }

    public function destroy($id)
    {
        Store::destroy($id);
        session()->flash('success', 'Product has been deleted successfully.');
        return redirect()->route("store.admin.index");
    }
}
