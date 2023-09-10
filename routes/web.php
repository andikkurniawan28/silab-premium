<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnalysisController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\DeviceLogController;
use App\Http\Controllers\ConsumableController;
use App\Http\Controllers\ConsumableLogController;
use App\Http\Controllers\IndicatorController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\SampleController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('vendor', VendorController::class);
Route::resource('consumable', ConsumableController::class);
Route::resource('consumable_log', ConsumableLogController::class);
Route::resource('device', DeviceController::class);
Route::resource('device_log', DeviceLogController::class);
Route::resource('category', CategoryController::class);
Route::resource('indicator', IndicatorController::class);
Route::resource('material', MaterialController::class);
Route::resource('sample', SampleController::class);
Route::resource('analysis', AnalysisController::class);
