<?php

namespace App\Http\Controllers\API;

use App\Group;
use App\Member;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberContoller extends Controller{
    private $user;
    public function __construct(){
        $this->middleware('auth:api');
        $this->user = auth('api')->user();
    }

    public function index()
    {
        //
    }

    public function getGroupMembers(){
        $grp = Group::where('admin', $this->user->id)->first();
        $members = Member::where('group', $grp->id)->get();
        $memberList = array();
        foreach ($members as $member){
            $user = User::findOrFail($member->user);
            array_push($memberList, $user);
        }
        return $memberList;
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

    public function checkIfAssignedToGroup(){
        return Member::where('user', $this->user->id)->where('status', '1')->count();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        if(Member::where('user', $this->user->id)->where('status', '1')->count() == 0){
            return Member::create([
                'user' => $this->user->id,
                'status' => '1',
                'group' => $request['group']
            ]);
        }else{
            return response()->json([
                'error' => 'Sorry, You already belong to a group'
            ], 422);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
