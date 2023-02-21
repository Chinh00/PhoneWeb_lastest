<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ManagerStaffController extends Controller
{
    public function index()
    {
        $title = "Quản lý nhân viên";
        $staffs = DB::table("user")
        ->select("user.id", "user.fullname", "user.status", "user.avatar", "user.phone", "user.email", "user.address", "user.role_id", "role.role_name")
        ->join("role", "role.id", "=", "user.role_id")->get();
        
        return view("backend.pages.users.user_list", compact("staffs", "title"));
    }

    public function staffSignUp()
    {
        return view("backend.pages.StaffSignUp");
    }

    public function postStaffSignUp(Request $request)
    {

        // $request->validate([
        //     "fullname" => "required|length:8",
        //     "email" => "required"
        // ], [

        // ]);
        $check = DB::table("user")->insert([
            "fullname" => $request->fullname,
            "email" => $request->email,
            "phone" => $request->phone,
            "password" => bcrypt($request->password),
            "role_id" => 3,
            "status" => "0",
            "created_at" => date('Y-m-d H:i:s')
        ]);
        if ($check) {
            return view("backend.pages.signup-successfully");
        }
    }

    public function setting($id)
    {
        $user = DB::table("user")->where("id", $id)->get();
        $role = DB::table("role")->get();
        return view("backend.pages.users.setting", compact("user", "role"));
    }


    public function postSetting(Request $request)
    {
        $check = DB::table("user")->where("id", $request->id)->update([
            "status" => $request->status,
            "role_id" => $request->role
        ]);

        if ($check) {
            $request->session()->flash("alert", "Update successfully");
        }
        return redirect("/admin/staff");

    }
}
