<?php

namespace App\Http\Controllers\API;

use App\County;
use App\SubCounty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountyController extends Controller{
    public function index(){
        return County::orderBy('id', 'asc')
            ->get();
    }

    public function create(){

    }

    public function store(Request $request){
        return County::create([
            'name' => $request['countyName']
        ]);
    }

    public function show($id){
        return County::findOrFail($id);
    }

    public function edit($id){

    }

    public function update(Request $request, $id){

    }

    public function destroy($id){
        if(SubCounty::where('county', $id)->count() > 0){
            return "Sorry!! Delete All Sub Counties that belong to this County First";
        }else{
            $sb = SubCounty::findOrFail($id);
            $sb->delete();
            return $this->index();
        }
    }
}
