<?php

namespace App\Http\Controllers\API;

use App\Group;
use App\Member;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberContoller extends Controller{
    private $user;
    public function __construct(){
        $this->middleware('auth:api');
        $this->user = auth('api')->user();
    }

    public function index(){

    }

    public function getGroupMembers(){
        $grp = Group::where('admin', $this->user->id)->first();
        return Member::where('group', $grp->id)
            ->with('User')
            ->get();
    }

    public function create(){

    }

    public function checkIfAssignedToGroup(){
        return Member::where('user', $this->user->id)->where('status', '1')->count();
    }

    public function store(Request $request){
        if(Member::where('user', $this->user->id)->where('status', '1')->count() == 0){
            return Member::create([
                'user' => $this->user->id,
                'status' => '0',
                'group' => $request['group']
            ]);
        }else{
            return response()->json([
                'error' =>  'Sorry, You already belong to a group'
            ], 422);
        }
    }

    public function show($id){

    }

    public function edit($id){

    }

    public function update(Request $request, $id){

    }

    public function destroy($id){
        $mmbr = Member::findOrFail($id);
        $messages = Message::where('user', $mmbr->user)->get();
        foreach ($messages as $message){
            $message->delete();
        }
        $mmbr->delete();
        return response()->json([
            'message' => 'deleted'
        ], 200);
    }

    public function approveMember($id){
        $member = Member::findOrFail($id);
        $member->status = 1;
        $userr = User::findOrFail($member->user);
        $userr->status = "active";
        $member->save();
        $userr->save();
        return response()->json([
            'message' => 'approved'
        ], 200);
    }
}
