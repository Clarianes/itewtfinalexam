<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Product.index', ['products' => Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Product.create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'productcode' => 'bail|required',
            'productname' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'color' => 'required',
            'size' => 'required|numeric',
            'price' => 'required|numeric'
        ]);
        $post = new Product();
        $post->productcode = $request->input('productcode');
        $post->productname = $request->input('productname');
        $post->description = $request->input('description');
        $post->category_id = $request->input('category_id');
        $post->color = $request->input('color');
        $post->size = $request->input('size');
        $post->price = $request->input('price');
        $post->save();
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::find($id);

        abort_if(!$products, 404);
        return view('Product.show', ['show' => $products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('Product.edit', compact('product'), ['categories' => Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateData = $request->validate([
            'productcode' => 'required',
            'productname' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'color' => 'required',
            'size' => 'required|numeric',
            'price' => 'required|numeric'
        ]);
        Product::whereId($id)->update($updateData);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();

        return back();
    }
}
