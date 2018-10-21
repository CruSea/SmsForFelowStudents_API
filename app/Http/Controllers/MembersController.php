<?php

namespace App\Http\Controllers;

use App\members;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members=members::all();
        return $members;
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
        $members=Felloship::where('fellowship_id',$request->input('fellowship_id'))->get();
        $message_fail="This Member already exist";
        $message_success="Successfully Created";
        if(count($members)<1)
        {
        $member=new Felloship;
                        
                $member->member_id=$request->input('member_id');
                $member->full_name=$request->input('full_name');
                $member->gender =$request->input('gender ');
                $member->age=$request->input('age');
                $member->phone_number=$request->input('phone_number');
                $member->Acadamic_department=$request->input('Acadamic_department');
                $member->fellowship_id=$request->input('fellowship_id');
                $member->save();
                return redirect()->with('message_success',$message_success);
        }else{
            
            return redirect()->with('message_fail',$message_fail);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\members  $members
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member=members::find($id);
        return view()->with('member',$member);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\members  $members
     * @return \Illuminate\Http\Response
     */
    public function edit(members $members)
    {
        $member=members::find($id);
        return view()->with('member',$member);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\members  $members
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $message_success="Successfully Created";
        $member=members::find($id);
        $member->member_id=$request->input('member_id');
        $member->full_name=$request->input('full_name');
        $member->gender =$request->input('gender ');
        $member->age=$request->input('age');
        $member->phone_number=$request->input('phone_number');
        $member->Acadamic_department=$request->input('Acadamic_department');
        $member->fellowship_id=$request->input('fellowship_id');
        $member->save();
        return redirect()->with('message_success',$message_success);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\members  $members
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member=member::find($id);
        $member->delete();
    }
}
