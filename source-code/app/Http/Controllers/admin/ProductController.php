<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $products = Product::with('category')->get();
        // dd($products[0]);
        // $product = Product::find(1)->with('categories')->get();
        // dd($product);
        return view('layouts.admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('layouts.admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        //
        // dd($request);
        $regex = "/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/";
        $request->validate([
            "name" => 'required',
            "category_id" => 'required',
            "description" => 'required',
            "price" => "regex:$regex",
            "image_url" => "required",
            "stock" => "required|numeric",
            "discount" => "required|numeric",
        ]);

        Product::create([
            "name" => $request->name,
            "category_id" => $request->category_id,
            "description" => $request->description,
            "price" => $request->price,
            "image_url" => $request->image_url,
            "stock" => $request->stock,
            "discount" => $request->discount,

        ]);

        return redirect()->back()->with(['message' => 'Product added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::find($id);
        $categories = Category::all();
        return view('layouts.admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        //

        $regex = "/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/";
        $request->validate([
            "name" => 'required',
            "category_id" => 'required',
            "description" => 'required',
            "price" => "regex:$regex",
            "image_url" => "required",
            "stock" => "required|numeric",
            "discount" => "required|numeric",
        ]);
        $product = Product::find($id);
        $product->update([
            "name" => $request->name,
            "category_id" => $request->category_id,
            "description" => $request->description,
            "price" => $request->price,
            "image_url" => $request->image_url,
            "stock" => $request->stock,
            "discount" => $request->discount,

        ]);

        return redirect()->back()->with(['message' => 'Product updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::find($id);
        $product->deleteOrFail();
        return redirect()->back()->with(['message' => 'Category Deleted Successfully']);
    }
}