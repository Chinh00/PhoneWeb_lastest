<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function inde(Request $request)
    {
        if ($request->session()->get("isLogin") == "1") {
            return redirect()->back();
        } else {
            return view("/backend.pages.login");
        }
        
    }
    public function postLogin(Request $request){
        $check = DB::table("user")->select("id", "role_id", "password", "fullname", "email")->where("email", $request->email)->get();
        if (isset($check)) {
            if (Hash::check($request->password, $check[0]->password)){
                $role_name = (DB::table("role")->select("role_name")->where("id", $check[0]->role_id)->get()[0]->role_name);

                if ($role_name != "No admin") {
                    $request->session()->put("role", $role_name);   
                    $request->session()->put("isLogin", "1");      
                    $request->session()->put("user_name", $check[0]->fullname);
                    $request->session()->put("user_id", $check[0]->id);         
                    return redirect("/admin/dashboard");
                } else {
                    return view("backend.pages.signup-successfully");
                }
            }
        }


    }


    public function logout(Request $request)
    {
        $request->session()->forget("isLogin");
        $request->session()->forget("role");
        $request->session()->forget("user_name");
        $request->session()->forget("user_id");
        return redirect()->back();
    }

}
