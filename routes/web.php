<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ManagerStaffController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ProfileController;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PhoneController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Profiler\Profile;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/",[Controller::class, "index"]);


// admin, staff

Route::get("/admin/login", [AdminController::class, "inde"]);
Route::post("/admin/login", [AdminController::class, "postLogin"]);


Route::get("/staff/register", [ManagerStaffController::class, "staffSignUp"]);
Route::post("/staff/sign-up", [ManagerStaffController::class, "postStaffSignUp"]);


Route::middleware("loginAdmin")->prefix("/admin")->group(function() {
    Route::get("/dashboard", [DashboardController::class, "index"]);
    
    //logout with sessionq
    Route::get("/logout", [AdminController::class, "logout"]);

    //Route for manager staff

    Route::prefix("/staff")->group(function() {
        Route::get("/", [ManagerStaffController::class, "index"]);
        Route::get("/setting/{id}", [ManagerStaffController::class, "setting"]);
        Route::post("/setting", [ManagerStaffController::class, "postSetting"]);

    });


    Route::prefix("/category")->group(function() {
        Route::get("/", [BrandController::class, "index"]);
        Route::get("/update/{id}", [BrandController::class, "update"]);
        Route::post("/update", [BrandController::class, "postUpdate"]);
        Route::get("/add", [BrandController::class, "add"]);
        Route::post("/add", [BrandController::class, "postAdd"]); 
    });

    Route::prefix("/product")->group(function() {
        Route::get("/", [ProductController::class, "index"]);
        Route::get("/add", [ProductController::class, "add"]);

        Route::post("/add", [ProductController::class, "postAdd"]);
        Route::get("/delete/{id}", [ProductController::class, "delete"]);
        Route::get("/edit/{id}", [ProductController::class, "edit"]);
        Route::post("/edit", [ProductController::class, "postEdit"]);

    });
    Route::prefix("/profile")->group(function() {
        Route::get("/{id}", [ProfileController::class, "getProfile"]);
        Route::post("/update", [ProfileController::class, "postProfile"]);
    });


});



Route::post("/login", [CustomerController::class, "postLogin"]);

Route::post("/register", [CustomerController::class, "postSignUp"]);


Route::get("/logout", [CustomerController::class, "logout"]);

Route::get("/quickView/{id}", [Controller::class, "quickView"]);


Route::get("/phone", [PhoneController::class, "index"]);
Route::get("/phone/{slug}", [PhoneController::class, "prdDetail"]);