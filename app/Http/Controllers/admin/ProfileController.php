<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class ProfileController extends Controller
{
    public function getProfile($id){
        $user = DB::table("user")->where("id", $id)->get();
        return view("backend.pages.users.profile", compact("user"));
    }
    public function postProfile(Request $request)
    {
        if (isset($request->img)){
            $str = md5(rand(1, 10000)) . '.' . $request->img->getClientOriginalExtension();
            $request->img->move(public_path("images/avatar"), $str);
            
            if(File::exists(public_path("images/avatar/". (DB::table("user")->select("avatar")->where("id", $request->id)->get()[0]->avatar)))){ 
                File::delete(public_path("images/avatar/" . (DB::table("user")->select("avatar")->where("id", $request->id)->get()[0]->avatar)));
            }
            DB::table("user")->where("id", $request->id)->update([
                "fullname" => $request->fullname,
                "address" => $request->address,
                "phone" => $request->phone,
                "avatar" => $str
            ]);
        } else {
            DB::table("user")->where("id", $request->id)->update([
                "fullname" => $request->fullname,
                "address" => $request->address,
                "phone" => $request->phone,
            ]);
        }
        return redirect("/admin/dashboard");
    }
}
