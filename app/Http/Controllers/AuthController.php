<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view("auth.login");
    }

    public function register(){
        return view("auth.register");
    }

    public function changePassword(){
        return view("auth.change_password");
    }

    public function loginProcess(Request $request){
        $attempt = Auth::attempt([
            "username"  => $request->username,
            "password"  => $request->password,
            "is_active" => 1,
        ]);
        if($attempt){
            $request->session()->regenerate();
            $request->session()->put("date", date("Y-m-d"));
            $request->session()->put("start", date("Y-m-d 00:00"));
            $request->session()->put("end", date("Y-m-d 23:59"));
            ActivityLog::write("Auth", "login", NULL);
            return redirect()->intended();
        } else {
            $user = User::where("username", $request->username);
            if($user->count("id") === 0){
                return redirect("login")->with("fail", "Your credential is not found!");
            }
            else {
                return redirect("login")->with("fail", "Your account is not active. Contact your Administrator to activate it!");
            }
        }

    }

    public function registerProcess(Request $request){
        $role_id = Role::min("id");
        $password = bcrypt($request->password);
        $request->request->add([
            "password"  => $password,
            "role_id"   => $role_id,
        ]);
        User::create($request->all());
        return redirect()->route("login");
    }

    public function changePasswordProcess(Request $request){
        if($request->password == $request->password2){
            User::whereId(Auth()->user()->id)->update(["password" => bcrypt($request->password)]);
            ActivityLog::write("Auth", "change password", NULL);
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect("login");
        } else {
            return redirect()->back();
        }
    }

    public function logout(Request $request){
        ActivityLog::write("Auth", "logout", NULL);
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("login");
    }

    public function changeDate(Request $request){
        $request->session()->put("date", $request->date);
        $request->session()->put("start", $request->date." 00:00");
        $request->session()->put("end", $request->date." 23:59");
        ActivityLog::write("Change", "date to", $request->date);
        return redirect()->back();
    }
}
