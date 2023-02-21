<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhoneController extends Controller
{
    public function index()
    {
        $products = DB::table("products")->paginate(3);
        return view("products", compact("products"));
    }
    

    public function prdDetail($slug)
    {
        $product = DB::table("products")->where("slug", $slug)->get();
        return view("product_detail", compact("product"));
    }
}
