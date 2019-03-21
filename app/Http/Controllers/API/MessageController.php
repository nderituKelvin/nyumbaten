<?php

namespace App\Http\Controllers\API;

use App\Group;
use App\Member;
use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller{
    private $user;

    public function __construct(){
        $this->middleware('auth:api');
        $this->user = auth('api')->user();
    }

    public function index(){

    }

    public function create(){

    }

    public function getGroupData(){
        $mbmr = Member::where('user', $this->user->id)->first();
        return Group::findOrFail($mbmr->group);
    }

    public function loadMessages(){
        if($this->user->usertype == 'alpha'){
            return Message::orderBy('id', 'desc')
                ->with('User')
                ->take(20)
                ->get();
        }
        $grp = $this->getGroupData();
        return Message::where('group', $grp->id)
            ->orderBy('id', 'desc')
            ->with('User')
            ->take(20)
            ->get();
    }

    public function store(Request $request){
        $grp = $this->getGroupData();
        return Message::create([
            'message' => $request['message'],
            'user' => $this->user->id,
            'group' => $grp->id
        ]);
    }

    public function show($id){

    }

    public function edit($id){

    }

    public function update(Request $request, $id){

    }

    public function destroy($id){

    }
}
