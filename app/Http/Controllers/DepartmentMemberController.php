<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DepartmentMember;
use App\members;
use App\Departments;
class DepartmentMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $departmentMember=DepartmentMember::all();
       return $departmentMember;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                $departmentMember=new DepartmentMember;     
                $departmentMember->member_id=$request->input('member_id');
                $departmentMember->department_id=$request->input('department_id');
                $departmentMember->save();
                return redirect()->with('message_success',$message_success);
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
                $departmentMember=DepartmentMember::find($id);     
                $departmentMember->member_id=$request->input('member_id');
                $departmentMember->department_id=$request->input('department_id');
                $departmentMember->save();
                return redirect()->with('message_success',$message_success);
    }
    public  function showGroup( $group_id){
        $showcontact = department::with('department')->where('department_id',$group_id)->paginate(5);

       $count = count($showcontact);
        $response=[
            'members'=>$showcontact,
            'count'=> $count
                  ];
        return response() ->json($response,200);

          }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $departmentMember=DepartmentMember::find($id);
        $departmentMember->delete();
        return redirect();
    }
}
