<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {   

        $brands = DB::table("brands")->get();
        $product_new = DB::table("products")->orderBy("created_at", "DESC")->limit(5)->get();
        $images = DB::table("images")->get();
        return view("welcome", compact("product_new", "images"));
    }

    public function quickView($id)
    {
        
        $product = DB::table("products")->where("id", $id)->get();
        $images = DB::table("images")->where("product_id", $id)->get();
        
        return view("quickView", compact("product", "images"));
    }
}
