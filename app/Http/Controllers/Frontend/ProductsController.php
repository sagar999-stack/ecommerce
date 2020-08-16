<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;
class ProductsController extends Controller
{
     public function index()
    {
    	$products = Product::orderBy('id','desc')->get();

    	return view('frontend.pages.product.index',compact('products'));
    }
     public function show($slug)
    {
    	$product = Product::where('slug',$slug)->first();
      
    	if(!is_null($product))
    	{
    		return view('frontend.pages.product.show',compact('product'));
    	}
    	else{
    		session()->flash('errors','sorry !!  There is no product by this URL..');
    		return redirect()->route('products');
    	}
    }
}
