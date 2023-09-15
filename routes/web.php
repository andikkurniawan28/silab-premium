<?php

use App\Http\Controllers\ActivityLogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\MethodController;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\AnalysisController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeviceLogController;
use App\Http\Controllers\IndicatorController;
use App\Http\Controllers\ConsumableController;
use App\Http\Controllers\ConsumableLogController;
use App\Http\Controllers\ResultController;

Route::get("login", [AuthController::class, "login"])->name("login");
Route::get("register", [AuthController::class, "register"])->name("register");
Route::post("login", [AuthController::class, "loginProcess"])->name("login.process");
Route::post("register", [AuthController::class, "registerProcess"])->name("register.process");
Route::get("logout", [AuthController::class, "logout"])->name("logout");
Route::post("changeDate", [AuthController::class, "changeDate"])->name("changeDate")->middleware(["auth"]);

Route::get("/", DashboardController::class)->name("dashboard")->middleware(["auth"]);
Route::resource('consumable_log', ConsumableLogController::class)->middleware(["auth"]);
Route::resource('device_log', DeviceLogController::class)->middleware(["auth"]);
Route::resource('sample', SampleController::class)->middleware(["auth"]);
Route::resource('analysis', AnalysisController::class)->middleware(["auth"]);

Route::resource('user', UserController::class)->middleware(["auth", "user_is_admin"]);
Route::resource('vendor', VendorController::class)->middleware(["auth", "user_is_admin"]);
Route::resource('consumable', ConsumableController::class)->middleware(["auth", "user_is_admin"]);
Route::resource('device', DeviceController::class)->middleware(["auth", "user_is_admin"]);
Route::resource('method', MethodController::class)->middleware(["auth", "user_is_admin"]);
Route::resource('category', CategoryController::class)->middleware(["auth", "user_is_admin"]);
Route::resource('indicator', IndicatorController::class)->middleware(["auth", "user_is_admin"]);
Route::resource('material', MaterialController::class)->middleware(["auth", "user_is_admin"]);

Route::get("activity_log", ActivityLogController::class)->name("activity_log")->middleware(["auth", "user_is_manager"]);
Route::get("result", ResultController::class)->name("result")->middleware(["auth"]);
