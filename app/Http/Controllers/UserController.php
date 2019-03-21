<?php

namespace App\Http\Controllers;

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
            }else{
                $usertype = 'admin';
            }

            User::create([
                'name' => $request['name'],
                'phone' => $request['phone'],
                'usertype' => $usertype,
                'status' => 'active',
                'password' => Hash::make($request['password'])
            ]);

            if($usertype == "member"){
                return redirect()->route('askToJoinGroup');
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
                return redirect()->to("/member");
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
