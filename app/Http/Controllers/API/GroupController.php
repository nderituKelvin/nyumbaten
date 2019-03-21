<?php

namespace App\Http\Controllers\API;

use App\Constituency;
use App\County;
use App\Group;
use App\Location;
use App\Member;
use App\SubCounty;
use App\Village;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupController extends Controller{
    private $user;
    public function __construct(){
        $this->middleware('auth:api');
        $this->user = auth('api')->user();
    }

    public function index(){
        return Group::all();
    }

    public function getAdminGroupCount(){
        return Group::where('admin', $this->user->id)->count();
    }

    public function getGroupsOfVillage($village){
        return Group::where('village', $village)->get();
    }

    public function getGroupData(){
        $mbmr = Member::where('user', $this->user->id)->first();
        return Group::findOrFail($mbmr->group);
    }

    public function getGroupLocation(){
        $group = $this->getGroupData();
        $village = Village::findOrFail($group->village);
        $location = Location::findOrFail($village->location);
        $consti = Constituency::findOrFail($location->constituency);
        $subCounty = SubCounty::findOrFail($consti->subCounty);
        $county = County::findOrFail($subCounty->county);

        return $county->name." | ".$subCounty->name." | ".$consti->name." | ".$location->name." | ".$village->name;
    }

    public function create(){

    }

    public function store(Request $request){
        if($this->getAdminGroupCount() == 0){
            $grp = Group::create([
                'village' => $request['village'],
                'name' => $request['groupName'],
                'admin' => $this->user->id
            ]);

            Member::create([
                'user' => $this->user->id,
                'status' => '1',
                'group' => $grp->id
            ]);

            return $grp;
        }else{
            return response()->json([
                'error' => 'You can only have One group'
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

    }
}
