<?php

namespace App\Http\Controllers\API;

use App\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationController extends Controller{
    public function index(){
        return Location::all();
    }

    public function create(){

    }

    public function store(Request $request){
        return Location::create([
            'name' => $request['location'],
            'constituency' => $request['constituency']
        ]);
    }

    public function getLocationsOfConstituency($constId){
        return Location::where('constituency', $constId)->get();
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
