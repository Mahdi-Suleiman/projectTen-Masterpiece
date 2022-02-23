<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Auth\Events\Validated;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $categories = Category::all();
        $categories = Category::with('products')->get();
        // dd($categories[0]);
        return view('layouts.admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('layouts.admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        //
        $request->validate([
            'name' => 'required|unique:categories,name',
            'description' => 'required',
            'image_url' => 'required'
        ]);

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'image_url' => $request->image_url

        ]);
        return redirect()->back()->with(['message' => 'Category added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category = Category::find($id);
        return view('layouts.admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
        // dd($request);
        $request->validate([
            'name' => 'required|unique:categories,name',
            'description' => 'required',
            'image_url' => 'required'
        ]);
        $category = Category::find($request->id);
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'image_url' => $request->image_url
        ]);
        return redirect()->back()->with(['message' => 'Category added successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $category = Category::find($id);
        $category->deleteOrFail();
        return redirect()->back()->with(['message' => 'Category Deleted Successfully']);
    }
}
