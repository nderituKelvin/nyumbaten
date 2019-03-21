<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExtFunctions extends Controller{
    public function backWithMessage($title, $message, $status){
        return redirect()->back()->with([
            'title' => $title,
            'message' => $message,
            'status' => $status
        ]);
    }

    public function justBack(){
        return redirect()->back();
    }

    public function toRouteWithMessage($route, $title, $message, $status){
        return redirect()->route($route)->with([
            'title' => $title,
            'message' => $message,
            'status' => $status
        ]);
    }

    public function backWithUnknownError(){
        return redirect()->back()->with([
            'title' => 'Sorry!!',
            'message' => 'A Fatal Error Occurred, We are however working on it',
            'status' => 'error'
        ]);
    }

    public function toRoute($route){
        return redirect()->route($route);
    }
}
