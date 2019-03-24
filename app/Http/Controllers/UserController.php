<?php

namespace App\Http\Controllers;

use App\Member;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller{
    public function index(){

    }

    public function create(){

    }

    public function store(Request $request){
        $exts = new ExtFunctions();
        if(User::where('phone', $request['phone'])->count() == 0){
            if(isset($request['usertype'])){
                $usertype = 'member';
                $status = 'pending';
            }else{
                $usertype = 'admin';
                $status = 'active';
            }

            User::create([
                'name' => $request['name'],
                'phone' => $request['phone'],
                'usertype' => $usertype,
                'status' => $status,
                'password' => Hash::make($request['password'])
            ]);

            if($usertype == "member"){
                return redirect()->route('memberSignIn');
            }

            return $exts->backWithMessage(
                "Success", "User successfully created", 'success'
            );
        }else{
            return $exts->backWithMessage(
                "Sorry", "This Phone is already registered", 'error'
            );
        }
    }

    public function show(User $user){

    }

    public function edit(User $user){

    }

    public function update(Request $request, User $user){

    }

    public function destroy(User $user){

    }

    public function login(Request $request){
        $exts = new ExtFunctions();
        if (Auth::attempt(['phone' => $request['phone'], 'password' => $request['password'] ])){
            if (Auth::user()->usertype == "alpha"){
                return redirect()->to("/alpha");
            }elseif (Auth::user()->usertype == "admin"){
                return redirect()->to("/admin");
            }elseif (Auth::user()->usertype == "member"){
                if(Member::where('user', Auth::user()->getAuthIdentifier())->where('status', '1')->count() == 1){
                    return redirect()->to("/member");
                }else if(Member::where('user', Auth::user()->getAuthIdentifier())->where('status', '1')->count() == 0){
                    if(Member::where('user', Auth::user()->getAuthIdentifier())->where('status', '0')->count() == 1){
                        return $exts->backWithMessage(
                        "Please Wait", "Your Group Approval is pending", 'error'
                        );
                    }elseif (Member::where('user', Auth::user()->getAuthIdentifier())->where('status', '0')->count() == 0){
                        return redirect()->to('/member');
                    }else{
                        return redirect()->route('logout');
                    }
                }else{
                    return redirect()->route('logout');
                }

            }else{
                return $exts->backWithMessage(
                    "Success", "User successfully created", 'success'
                );
            }
        }else{
            return $exts->backWithMessage( "Login Failed", "Please Check Your password", "info");
        }
    }

    public function signUp(Request $request){
        $exts = new ExtFunctions();
        $user = User::create([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'usertype' => $request['usertype'],
            'status' => 'active',
            'password' => Hash::make($request['password']),
        ]);
        Auth::loginUsingId($user->id);
        return redirect()->route('askToJoinGroup');
    }
}
