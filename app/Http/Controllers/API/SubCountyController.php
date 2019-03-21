<?php

namespace App\Http\Controllers\API;

use App\SubCounty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCountyController extends Controller{
    public function index(){
        return SubCounty::orderBy('name', 'asc')->get();
    }

    public function getSubCountiesOfCounty($county){
        return SubCounty::where('county', $county)->get();
    }

    public function create(){

    }

    public function store(Request $request){
        return SubCounty::create([
            'name' => $request['subCounty'],
            'county' => $request['countyId'],
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
