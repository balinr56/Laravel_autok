<?php
use App\Http\Controllers\ModelsController;
use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;

Route::resource('brands', BrandController::class);
Route::resource('models', ModelsController::class);

Route::get('/', function () {
    return view('welcome');
});
