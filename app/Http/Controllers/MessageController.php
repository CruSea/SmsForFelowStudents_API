<?php

namespace App\Http\Controllers;

use App\SentMessages;
use App\members;
use App\DepartmentMember;
use App\DepartmentMessage;
use Illuminate\Http\Request;


class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public  function getDepartment(){
        $departments = DepartmentMember::all();
        $response=[
            'departments'=>$departments
        ];
        return response() ->json($response,200);
    }
    
    public function send_member_message(Request $request){
        $status=0;
        $sent_message= new SentMessages([

            'message' => $request->input('message'),
            'sent_to' => $request->input('sent_to'),
            'status' => $status
        ]);
        $sent_message->save();

        return response()->json([
            'info'=>'message Sent!!'
        ],201);
    }
    public function get_member_message(){
        $messages = SentMessages::orderBy('id','DESC')->paginate(5);
        $response=[
            'messages'=>$messages
        ];
        return response() ->json($response,200);
    }

public function send_department_message(Request $request){
          $status = 0;
            //$user = JWTAuth::parseToken()->toUser();
            $department_message = new DepartmentMessage();
            $department_message->message = $request->input('message');
            $department_message->department_id = $request->input('department_id');
            // $department_message->sent_by = $user->fullname;
            $department_message->save();
        $members = members::whereIn('id',DepartmentMember::where('department_id','=', $department_message->department_id)->select('member_id')->get() )->get();
           for( $i = 0; $i < count($members); $i++) {

                $member = $members[$i];
                $sent_message = new SentMessages([
                    'message' => $request->input('message'),
                    'sent_to' => $member->phone_number,
                    'status' => $status
                ]);
                $sent_message->save();

        }


//            $department_message->sent_messages()->saveMany($sent_message);
            return response()->json([
                'info'=>'message Sent!!'
            ],201);

    }
    public function get_department_message(){
        $messages = DepartmentMessage::orderBy('id','DESC')->paginate(5);
        $response=[
            'messages'=>$messages
        ];
        return response() ->json($response,200);
    }
    public function DeleteDepartmentMessage($id){
        $department_message = DepartmentMessage:: find($id);
        $department_message -> delete();
        return response() -> json (['message'=> 'Message Deleted!'],200);
    }
    public function DeleteMemberMessage($id){
        $member_message = SentMessages:: find($id);
        $member_message -> delete();
        return response() -> json (['message'=> 'Message Deleted!'],200);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SentMessages  $sentMessages
     * @return \Illuminate\Http\Response
     */
    public function show(SentMessages $sentMessages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SentMessages  $sentMessages
     * @return \Illuminate\Http\Response
     */
    public function edit(SentMessages $sentMessages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SentMessages  $sentMessages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SentMessages $sentMessages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SentMessages  $sentMessages
     * @return \Illuminate\Http\Response
     */
    public function destroy(SentMessages $sentMessages)
    {
        //
    }
}
