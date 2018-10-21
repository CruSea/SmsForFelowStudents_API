<?php

namespace App\Http\Controllers;

use App\Departments;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments=Departments::all();
        return view()->with('departments',$departments);
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
        $departments=Departments::where('department_id',$request->input('department_id'))->get();
        if(count($departments)<1)
        {
        $department=new Departments;
                        
                // $department->department_id=$request->input('department_id');
                $department->department_name =$request->input('department_name ');
                $department->number_of_members=$request->input('number_of_members');
                $department->team_leader_id=$request->input('team_leader_id');
                $department->fellowship_id=$request->input('fellowship_id');
                $department->save();
        }else{
            $message="This Department already exist";
            return $message;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Departments  $departments
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department=Departments::find($id);
        return view()->with('department',$department);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Departments  $departments
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department=Departments::find($id);
        return view()->with('department',$department);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Departments  $departments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message="Updated Successfully";
        $department=Department::find($id);
        $department->department_id=$request->input('department_id');
        $department->department_name =$request->input('department_name ');
        $department->number_of_members=$request->input('number_of_members');
        $department->team_leader_id=$request->input('team_leader_id');
        $department->fellowship_id=$request->input('fellowship_id');
        $department->save();
        return redirect('')->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Departments  $departments
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message="Deleted Successfully";
        $department=Departments::find($id);
        $department->delete();
        return redirect('')->with('message',$message);
    }
}
