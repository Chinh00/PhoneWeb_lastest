<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\AdminLogin;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table("products")
        ->select("products.id", "products.slug", "products.name", "products.quantity", "products.price", "products.sale_price", "products.status", "guarantee.guarantee_name")
        ->join("guarantee", "guarantee.id", "=", "products.guarantee_id")
        ->get();


        
        return view("backend.pages.products.product_list", compact("products"));
    }


    public function add()
    {
        $guarantee = DB::table("guarantee")->get();
        $brands = DB::table("brands")->get();
        return view("backend.pages.products.product_add", compact("brands", "guarantee"));
    }


    public function postAdd(Request $request)
    {
        $pid = DB::table("products")->insertGetId([
            "name" => $request->name, 
            "slug" => $request->slug,
            "quantity" => ($request->quantity ?? 0),
            "price" => ($request->price ?? 0),
            "sale_price" => ($request->sale_price ?? 0),
            "content" => ($request->content ?? "<h1>No content</h1>"),
            "status" => $request->status,
            "cpu" => $request->cpu,
            "display_size" => $request->display_size,
            "ram" => $request->ram,
            "os" => $request->os,
            "pin" => $request->pin,
            "camera" => $request->camera,
            "condition" => $request->condition,
            "guarantee_id" => $request->guarantee_id,
            "brand_id" => $request->brand_id,
            "created_at" => date('Y-m-d H:i:s')

        ]);

        if(isset($request->images)) {
            foreach($request->images as $key){
                $str = md5(rand(1, 10000)) . '.' . $key->getClientOriginalExtension();
                $key->move(public_path("images"), $str);
                DB::table("images")->insert([
                    "product_id" => $pid,
                    "link" => $str
                ]);
            }
        }
        return redirect("/admin/product")->with("alert", "Add product successfully");
        
    }

    public function delete($id)
    {
        $img = DB::table("images")->select()->where("product_id", $id)->get();
        foreach ($img as $key => $val){
            if(File::exists(public_path("images/". $val->link))){ 
                File::delete(public_path("images/" . $val->link));
            }
        }
        DB::table("images")->where("product_id", $id)->delete();
        DB::table("products")->where("id", $id)->delete();
        return redirect("/admin/product")->with("alert", "Delete successfully");
    }


    public function edit($id)
    {
        $product = DB::table("products")->where("id", $id)->get();

        
        $guarantee = DB::table("guarantee")->get();
        $brands = DB::table("brands")->get();

        return view("backend.pages.products.product_edit", compact("product", "guarantee", "brands"));

    }

    public function postEdit(Request $request)
    {
        $check = DB::table("products")->where("id", $request->id)->update([
            "name" => $request->name, 
            "slug" => $request->slug,
            "quantity" => ($request->quantity ?? 0),
            "price" => ($request->price ?? 0),
            "sale_price" => ($request->sale_price ?? 0),
            "content" => ($request->content ?? "<h1>No content</h1>"),
            "status" => $request->status,
            "cpu" => $request->cpu,
            "display_size" => $request->display_size,
            "ram" => $request->ram,
            "os" => $request->os,
            "pin" => $request->pin,
            "camera" => $request->camera,
            "condition" => $request->condition,
            "guarantee_id" => $request->guarantee_id,
            "brand_id" => $request->brand_id,
            "updated_at" => date('Y-m-d H:i:s')
        ]);
        if (isset($request->images)){
            $img = DB::table("images")->select()->where("product_id", $request->id)->get();
            foreach ($img as $key => $val){
                if(File::exists(public_path("images/". $val->link))){ 
                    File::delete(public_path("images/" . $val->link));
                }
            }
            DB::table("images")->where("product_id", $request->id)->delete();
            foreach($request->images as $key){
                $str = md5(rand(1, 10000)) . '.' . $key->getClientOriginalExtension();
                $key->move(public_path("images"), $str);
                DB::table("images")->insert([
                    "product_id" => $request->id,
                    "link" => $str
                ]);
            }
        }
        
        return ($check ? redirect("/admin/product")->with("alert", "Update successfully") : redirect("/admin/product") );
    }
}
