<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnalysisController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\DeviceLogController;
use App\Http\Controllers\ConsumableController;
use App\Http\Controllers\ConsumableLogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndicatorController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\SampleController;

Route::get("login", [AuthController::class, "login"])->name("login");
Route::get("register", [AuthController::class, "register"])->name("register");
Route::post("login", [AuthController::class, "loginProcess"])->name("login.process");
Route::post("register", [AuthController::class, "registerProcess"])->name("register.process");
Route::get("logout", [AuthController::class, "logout"])->name("logout");

Route::get("/", DashboardController::class)->name("dashboard")->middleware(["auth"]);
Route::resource('vendor', VendorController::class)->middleware(["auth"]);
Route::resource('consumable', ConsumableController::class)->middleware(["auth"]);
Route::resource('consumable_log', ConsumableLogController::class)->middleware(["auth"]);
Route::resource('device', DeviceController::class)->middleware(["auth"]);
Route::resource('device_log', DeviceLogController::class)->middleware(["auth"]);
Route::resource('category', CategoryController::class)->middleware(["auth"]);
Route::resource('indicator', IndicatorController::class)->middleware(["auth"]);
Route::resource('material', MaterialController::class)->middleware(["auth"]);
Route::resource('sample', SampleController::class)->middleware(["auth"]);
Route::resource('analysis', AnalysisController::class)->middleware(["auth"]);
