<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Image;
use File;



class SlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $sliders = Slider::orderBy('priority','asc')->get();
        return view('backend.pages.sliders.index',compact('sliders'));
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[

        'title' => 'required',
        'image' => 'required|image',
        'priority' => 'required',
        'button_link' => 'nullable|url'
       ],
       [
         'title.required' => 'Please privide slider title',
        'priority.required' => 'please provide slider priority',
        'image.required' => 'please provide slider image',
        'image.image' => 'Please provide a valid slider image',
        'button_link.url' => 'Please provide a valid slider button link'
       ]);
       $slider = new Slider();
       $slider->title = $request->title;
       $slider->button_text = $request->button_text;
       $slider->button_link = $request->button_link;
       $slider->priority = $request->priority;
           if (($request->image) >0){
        
                 
           $image = $request->file('image');
            $img = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/sliders/'.$img);
            Image::make($image)->save($location);
            $slider->image = $img;
        }
       $slider->save();

      session()->flash('success','A new slider has added successfully');
       return redirect()->route('admin.sliders');

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
        $this->validate($request,[

        'title' => 'required',
        'image' => 'nullable|image',
        'priority' => 'required',
        'button_link' => 'nullable|url'
       ],
       [
         'title.required' => 'Please privide slider title',
        'priority.required' => 'please provide slider priority',
        'image.image' => 'Please provide a valid slider image',
        'button_link.url' => 'Please provide a valid slider button link'
       ]);
       $slider = Slider::find($id);
       $slider->title = $request->title;
       $slider->button_text = $request->button_text;
       $slider->button_link = $request->button_link;
       $slider->priority = $request->priority;
           if (($request->image) != NUll){
        // Delete the old file
            if(File::exists('images/sliders/'.$slider->image))
            {

                File::delete('images/sliders/'.$slider->image);
            }
                 
           $image2 = $request->file('image');
            $img2 = time().'.'.$image2->getClientOriginalExtension();
            $location = public_path('images/sliders/'.$img2);
            Image::make($image2)->save($location);
            $slider->image = $img2;
        }
       $slider->save();

       session()->flash('success',' slider has updated successfully');
       return redirect()->route('admin.sliders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $slider=Slider::find($id);

        if(!is_null($slider)){
            // delete Image
           if(File::exists('images/sliders/'.$slider->image)){
                File::delete('images/sliders/'.$slider->image);
            }
            $slider->delete();
        }
        session()->flash('success','Slider has deleted successfully');
        return back();
    }
}
