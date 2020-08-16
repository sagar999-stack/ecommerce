<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\District;


class DivisionsController extends Controller
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
        $divisions = Division::orderBy('priority','asc')->get();
        return view('backend.pages.divisions.index',compact('divisions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.divisions.create');
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

        'name' => 'required',
        'priority' => 'required'
       ],
       [
        'name.required' => 'Please provide a division name',
        'priority.required' => 'please provide a division priority',
       ]);
       $division = new Division();
       $division->name = $request->name;
       $division->priority = $request->priority;
       $division->save();

      session()->flash('success','A new division has added successfully');
       return redirect()->route('admin.divisions');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $division = Division::find($id);
        if(!is_null($division)){
            return view('backend.pages.divisions.edit',compact('division'));
        }
        else{
            return redirect()->route('admin.divisions');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        'name' => 'required',
        'priority' => 'required'
       ],
       [
        'name.required' => 'Please provide a division name',
        'priority.required' => 'please provide a division priority',
       ]);
       $division = Division::find($id);
       $division->name = $request->name;
       $division->priority = $request->priority;
       $division->save();

       session()->flash('success',' division has updated successfully');
       return redirect()->route('admin.divisions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $division=Division::find($id);

        if(!is_null($division)){
            // delete all the districts under the division
            $districts=District::where('division_id',$division->$id)->get();
            foreach ($districts as $district) {
               $district->delete();
            }
            $division->delete();
        }
        session()->flash('success','Division has deleted successfully');
        return back();
    }
}
