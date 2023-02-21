<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{   
    public function postSignUp(Request $request)
    {
        $fullname = 
        $uid = DB::table("customer")->insertGetId([
            "fullname" => ($request->first_name . $request->last_name),
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "password" => bcrypt($request->password),
            "email" => $request->email,
            "status" => "1",
            "created_at" => date('Y-m-d H:i:s')

        ]);

        if ($uid) {
            $request->session()->put("isLogin", 1);
            $request->session()->put("user_name", ($request->first_name . $request->last_name));
            $request->session()->put("user_id", $uid);

        }
        return redirect()->back();

    }    

    public function logout(Request $request)
    {
        $request->session()->forget("isLogin");
        $request->session()->forget("user_name");
        $request->session()->forget("user_id");
        return redirect()->back();

    }



    public function postLogin(Request $request)
    {
        $user = DB::table("customer")->where("email", $request->email)->get();
        if (isset($user)) {
            if (Hash::check($request->password, $user[0]->password)){
                $request->session()->put("isLogin", 1);
                $request->session()->put("user_name", $user[0]->fullname);
                $request->session()->put("user_id", $user[0]->id);
                return redirect()->back();
            } else {
                return redirect()->back();
            }
        }
        return redirect()->back();
    }
}
