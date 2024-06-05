<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Item;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('product.index', ['products' => Item::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product-img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'product-title' => 'required',
            'product-description' => 'required',
            'product-category' => 'required',
            'product-price' => 'required',
            'product-stock' => 'required',

        ]);
        $product = new Item();
        $product->title = strip_tags($request->input('product-title'));
        $product->description = strip_tags($request->input('product-description'));
        $product->category = strip_tags($request->input('product-category'));
        $product->price = strip_tags($request->input('product-price'));
        $product->stock = strip_tags($request->input('product-stock'));
        if ($request->hasFile('product-img')) {
            $imagePath = $request->file('product-img')->store('product/images', 'public');
            $product->image = strip_tags($imagePath);
        }
        $product->save();
        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Item::findOrFail($id);
        return view('product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Item::findOrFail($id);
        return view("product.edit", ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            // 'product-img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'product-title' => 'required',
            'product-description' => 'required',
            'product-category' => 'required',
            'product-price' => 'required',
            'product-stock' => 'required',

        ]);
        $product = Item::findOrFail($id);
        
        $product->title = strip_tags($request->input('product-title'));
        $product->description = strip_tags($request->input('product-description'));
        $product->category = strip_tags($request->input('product-category'));
        $product->price = strip_tags($request->input('product-price'));
        $product->stock = strip_tags($request->input('product-stock'));
        if ($request->hasFile('product-img')) {
            $imagePath = $request->file('product-img')->store('product/images', 'public');
            $product->image = strip_tags($imagePath);
        }
        $product->save();
        return redirect()->route('product.show',$id)->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Item::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product deleted successfully');
    }
}
