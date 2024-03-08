<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;


class ProductsController
{
    public function index()
    {
        $data=Products::all();
        return view("products.index",compact('data'));
    }

    public function create()
    {
        $method="post";
        $action="product.store";
        return view("products.create-or-edit",compact("method","action"));
    }

    public function store(Request $request)
    {
        $path=$request->file('image')->store('','public');
        $product=Products::create([
            'name'=>$request->name,
            'stock'=>$request->stock,
            'price'=>$request->price,
            'description'=>$request->description,
            'category'=>$request->category,
            'image'=>$path
        ]);
        return redirect()->route("product.index")->with("success","Berhasil Menambahkan Data");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data=Products::where('id',$id);
        return view('products.create-or-edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data=Products::findorfail($id);

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
            'stock'=>$request->stock,
            'price'=>$request->price,
            'description'=>$request->description,
            'category'=>$request->category
        ];
        $data->update($product);
        return redirect()->route("product.index");

    }

    public function destroy($id)
    {
        Products::destroy($id);
        return redirect()->route("product.index");
    }
}
