<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Image;
use File;
class BrandsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()

    {
    	$brands = Brand::orderby('id','desc')->get();
    	return view('backend.pages.brands.index')->with('brands',$brands);

    }

    public function create()


    {
    	
    	return view('backend.pages.brands.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'image'=>'Nullable|image ',
        ],

        [
            'name.required' => 'Please provide a Brand name',
            'image.image' => 'Please provide a valid image with .jpg, .png, .gif, .jpeg extention',
        ]);

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->description =$request->description;
 



         if (($request->image) >0){
        
                 
           $image = $request->file('image');
            $img = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/brands/'.$img);
            Image::make($image)->save($location);
            $brand->image = $img;
        }

        $brand->save();

        session()->flash('success', 'A new brands has added successfully');

        return redirect()->route('admin.brands');
    }

    public function edit($id)
    {
   
        $brand= Brand::find($id);
        if(!is_null($brand)){
            return view('backend.pages.brands.edit', compact('brand'));
        }
        else {
            return redirect()->route('admin.brands');
        }
    }



    //update function

      public function update(Request $request,$id)
    {
       
        $this->validate($request,[
            'name' => 'required',
            'image'=>'Nullable|image ',

        ],

        [
            'name.required' => 'Please provide a Brand name',
            'image.image' => 'Please provide a valid image with .jpg, .png, .gif, .jpeg extention',
        ]);
  
        $brand =  Brand::find($id);
         $brand->name = $request->name;
         $brand->description =$request->description;
  



         if (($request->image) >0){
        // // delete old image
            
           if(File::exists('images/brands/'.$brand->image))
            {
              File::delete('images/brands/'.$brand->image) ;
            }   
          
           $image2 = $request->file('image');
           $img = time().'.'.$image2->getClientOriginalExtension();
            $location = public_path('images/brands/'.$img);
            Image::make($image2)->save($location);
            $brand->image = $img;
       }

        $brand->save();

        session()->flash('success', 'Updated  successfully');

        return redirect()->route('admin.brands');
    }

       public function delete($id){
        $brand = Brand::find($id);
    
        if (!is_null($brand)) {

        
          
            // Delete Brand image
            if(File::exists('images/categories/'.$brand->image))
            {
              File::delete('images/categories/'.$brand->image) ;
            } 
            $brand->delete();
        }

        session()->flash('success','Brand has been deleted successfully');
        return back();
    
    }
}
