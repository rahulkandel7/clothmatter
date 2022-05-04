<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string'],
            'sku' => ['required','numeric'],
            'price' => ['required','numeric'],
            'isDiscounted' => ['nullable','boolean'],
            'isAvailable' => ['required','boolean'],
            'discountedPrice' => ['nullable','numeric'],
            'stock' => ['required','numeric'],
            'description' => ['required','string'],
            'photopath1' => ['required','image','mimes:png,jpg'],
            'photopath2' => ['nullable','image','mimes:png,jpg'],
            'photopath3' => ['nullable','image','mimes:png,jpg'],
            'color' => ['required','string'],
            'brand' => ['required','string'] ,
            'size' => ['required','string'] ,
            'category_id' => ['required'],
        ]);

        if($request->has('photopath1')){
            $fname = Str::random(20);
            $fexe = $request->file('photopath1')->extension();
            $fpath = "$fname.$fexe";

            $request->file('photopath1')->storeAs('public/products', $fpath);

            $data['photopath1'] = 'products/'.$fpath;
            
        }

        if($request->has('photopath2')){
            $fname = Str::random(20);
            $fexe = $request->file('photopath2')->extension();
            $fpath = "$fname.$fexe";

            $request->file('photopath2')->storeAs('public/products', $fpath);

            $data['photopath2'] = 'products/'.$fpath;
            
        }

        if($request->has('photopath3')){
            $fname = Str::random(20);
            $fexe = $request->file('photopath3')->extension();
            $fpath = "$fname.$fexe";

            $request->file('photopath3')->storeAs('public/products', $fpath);

            $data['photopath3'] = 'products/'.$fpath;
            
        }

        Product::create($data);

        return redirect(route('admin.products.index'))->with('success', 'Product added sucessfully');
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
    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('admin.products.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => ['required','string'],
            'sku' => ['required','numeric'],
            'price' => ['required','numeric'],
            'isDiscounted' => ['nullable','boolean'],
            'isAvailable' => ['required','boolean'],
            'discountedPrice' => ['nullable','numeric'],
            'stock' => ['required','numeric'],
            'description' => ['required','string'],
            'photopath1' => ['nullable','image','mimes:png,jpg'],
            'photopath2' => ['nullable','image','mimes:png,jpg'],
            'photopath3' => ['nullable','image','mimes:png,jpg'],
            'color' => ['required','string'],
            'brand' => ['required','string'] ,
            'size' => ['required','string'] ,
            'category_id' => ['required'],
        ]);

        if($request->has('photopath1')){
            $fname = Str::random(20);
            $fexe = $request->file('photopath1')->extension();
            $fpath = "$fname.$fexe";

            $request->file('photopath1')->storeAs('public/products', $fpath);

            if($product->photopath1){
                Storage::delete('public/'. $product->photopath1);
            }

            $data['photopath1'] = 'products/'.$fpath;
            
        }

        if($request->has('photopath2')){
            $fname = Str::random(20);
            $fexe = $request->file('photopath2')->extension();
            $fpath = "$fname.$fexe";

            $request->file('photopath2')->storeAs('public/products', $fpath);

            if($product->photopath2){
                Storage::delete('public/'. $product->photopath2);
            }

            $data['photopath2'] = 'products/'.$fpath;
            
        }

        if($request->has('photopath3')){
            $fname = Str::random(20);
            $fexe = $request->file('photopath3')->extension();
            $fpath = "$fname.$fexe";

            $request->file('photopath3')->storeAs('public/products', $fpath);

            if($product->photopath3){
                Storage::delete('public/'. $product->photopath3);
            }

            $data['photopath3'] = 'products/'.$fpath;
            
        }

        $product->update($data);

        return redirect(route('admin.products.index'))->with('success', 'Product updated sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
    public function delete(Request $request)
    {
        $s = Product::find($request->dataid);
        Storage::delete('public/'.$s->photopath1);
        Storage::delete('public/'.$s->photopath2);
        Storage::delete('public/'.$s->photopath3);
        $s->delete();
        return redirect(route('admin.products.index'))->with('success', 'Product Deleted Sucessfully');

    }
}
