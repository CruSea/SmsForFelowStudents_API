<?php

namespace App\Http\Controllers;

use App\Fellowship;
use Illuminate\Http\Request;

class FellowshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fellowships=Fellowship::all();
        return $fellowships;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fellowships=Felloship::where('fellowship_id',$request->input('fellowship_id'))->get();
        $message_fail="This Fellowship already exist";
        $message_success="Successfully Created";
        if(count($fellowships)<1)
        {
        $fellowship=new Felloship;
                        
                $fellowship->fellowship_id=$request->input('fellowship_id');
                $fellowship->city=$request->input('city');
                $fellowship->university_name =$request->input('university_name ');
                $fellowship->number_of_members=$request->input('number_of_members');
                $fellowship->number_of_group=$request->input('number_of_group');
                $fellowship->place=$request->input('place');
                $fellowship->save();
                return re()->with('message_success',$message_success);
        }else{
            
            return redirect()->with('message_fail',$message_fail);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fellowship  $fellowship
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fellowship=Fellowship::find($id);
        return redirect()->with('fellowship',$fellowship);    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fellowship  $fellowship
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fellowship=Fellowship::find($id);
        return redirect()->with('fellowship',$fellowship); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fellowship  $fellowship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $message='Successfully updated';
        $fellowship= Fellowship::find($id);
                $fellowship->city=$request->input('city');
                $fellowship->university_name =$request->input('university_name ');
                $fellowship->number_of_members=$request->input('number_of_members');
                $fellowship->number_of_group=$request->input('number_of_group');
                $fellowship->place=$request->input('place');
                $fellowship->save();
                return redirect()->with('message',$message);
                
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fellowship  $fellowship
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message="Successfully Deleted";
        $fellowship= Fellowship::find($id)->first();
        $fellowship->delete();
        return redirect()->with('message',$message);
    }
}
