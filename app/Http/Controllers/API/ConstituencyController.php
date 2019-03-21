<?php

namespace App\Http\Controllers\API;

use App\Constituency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConstituencyController extends Controller{
    public function index(){
        return Constituency::all();
    }

    public function create(){

    }

    public function getConstituenciesOfSubCounty($subCounty){
        return Constituency::where('subCounty', $subCounty)->get();
    }

    public function store(Request $request){
        return Constituency::create([
            'name' => $request['constituency'],
            'subCounty' => $request['subCounty']
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
