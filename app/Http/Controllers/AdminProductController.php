<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use Illuminate\Support\Str;
use Image;
class AdminProductController extends Controller
{
	   public function index()
    {
        $products = Product::orderBy('id','desc')->get();
        return view('admin.pages.product.index')->with('products',$products);
        
    }
     public function create()
    {
    	return view('admin.pages.product.create');
    }
     public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.pages.product.edit')->with('product',$product);
        
    }
   

     public function store(Request $request)
    {


        $request->validate([

            'title'=>'required|max:150',
            'description'=>'required',
            'price'=>'required|numeric',
            'quantity'=>'required|numeric',

        ]);

    	$product = new Product;

    	$product-> title = $request->title;
    	$product-> description = $request->description;
    	$product-> price = $request->price;
    	$product-> quantity = $request->quantity;
    	$product-> slug = Str::slug($request->title);
    	$product-> category_id = 1;
    	$product-> brand_id = 1;
    	$product-> admin_id = 1;
    	$product->save();

        //productImage Model insert Image

        // if ($request->has('product_image')){
        //     //inset that image
        //     $image = $request->file('product_image');
        //     $img = time().'.'.$image->getClientOriginalExtension();
        //     $location = public_path('images/products/'.$img);
        //     Image::make($image)->save($location);

        //     $product_image = new productImage;
        //     $product_image->product_id = $product->id;
        //     $product_image->image = $img;
        //     $product_image->save();
        // }


        if (count($request->product_image) > 0){
         //   var_dump($request->product_image);
            foreach ($request->product_image as $image) {
                 
           // $image = $request->file('product_image');
            $img = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/products/'.$img);
            Image::make($image)->save($location);

            $product_image = new ProductImage;
            $product_image->product_id = $product->id;
            $product_image->image = $img;
            $product_image->save();
            }

        }
        //return view('admin.pages.product.create');
    	return redirect()->route('admin.product.create');
    }


     public function update(Request $request, $id)
    {


        $request->validate([

            'title'=>'required|max:150',
            'description'=>'required',
            'price'=>'required|numeric',
            'quantity'=>'required|numeric',

        ]);

        $product = Product::find($id);

        $product-> title = $request->title;
        $product-> description = $request->description;
        $product-> price = $request->price;
        $product-> quantity = $request->quantity;
     
        $product->save();

      
        //return view('admin.pages.product.create');
        return redirect()->route('admin.products');
    }

    public function delete($id){
    	$product = Product::find($id);
    
    	if (!is_null($product)) {
    		$product->delete();
    	}

    	session()->flash('success','Product has been deleted successfully');
    	return back();
    
    }
    
}
