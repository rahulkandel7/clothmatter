<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slideshow;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home(){
        $slideshows = Slideshow::all();

        $womens = Product::where('gender','womens')->where('isAvailable',1)->take(8)->latest()->get();
        $mens = Product::where('gender','mens')->where('isAvailable',1)->take(8)->latest()->get();
        return view('welcome',compact('slideshows','womens','mens'));
    }

    public function view($id)
    {
        $product = Product::findOrFail($id);
        $colors = explode(',',$product->color);
        $sizes = explode(',',$product->size);
        return view('view',compact('product','colors','sizes'));
    }
}
