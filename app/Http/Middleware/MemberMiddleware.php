<?php

namespace App\Http\Middleware;

use App\Http\Controllers\ExtFunctions;
use Closure;
use Illuminate\Support\Facades\Auth;

class MemberMiddleware{
    public function handle($request, Closure $next){
        $exts = new ExtFunctions();
        if(Auth::check()){
            if(Auth::user()->usertype == "member"){
                return $next($request);
            }else{
                return $exts->toRouteWithMessage("memberSignIn", "Access Denied", "Please Log In", "error");
            }
        }else{
            return $exts->toRouteWithMessage("memberSignIn", "Access Denied", "Please Log In", "error");
        }
    }
}
