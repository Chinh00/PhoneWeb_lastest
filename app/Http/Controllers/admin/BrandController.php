<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BrandController extends Controller
{
    public function index()
    {
        $brands = DB::table("brands")->get();
        return view("backend.pages.category.category_list", compact("brands"));
    }

    public function update($id)
    {
        $brand = DB::table("brands")->where("id", $id)->get();
        return view("backend.pages.category.category_edit", compact("brand"));
    }
    public function postUpdate(Request $request)
    {
        $state = DB::table("brands")->where("id", $request->id)->update([
            "brand_name" => $request->name, 
            "slug" => $request->slug
        ]);

        if ($state){
            $request->session()->flash("alert", "Update successfully");
        }
        return redirect("/admin/category");

    }
    public function add()
    {
        return view("backend.pages.category.category_add");
    }

    public function postAdd(Request $request)
    {
        $state = DB::table("brands")->insert([
            "brand_name" => $request->name, 
            "slug" => $request->slug
        ]);
        if ($state) {
            $request->session()->flash("alert", "Add successfully");
        }
        return redirect("/admin/category");
    }
}
