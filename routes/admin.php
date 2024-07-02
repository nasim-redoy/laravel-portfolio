<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SkillController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::prefix('admin')->name('admin.')->group(function () {

//Route::controller(CategoryController::class)->group(function () {
//    Route::get('categories', 'viewCategory')->name('category.view');
//    Route::get('categories/{category}','getCategoryById')->name('category.getCategoryById');
//    Route::post('categories','store')->name('category.store');
//    Route::patch('categories/update/{category}','update')->name('category.update');
//    Route::patch('categories/statusChangeById','categoryStatusChangeById')->name('category.categoryStatusChangeById');
//    Route::delete('categories/categoryDeleteById','categoryDeleteById')->name('category.categoryDeleteById');
//});



Route::prefix('admin')->name('admin.')->group(function (){
    Route::controller(DashboardController::class)->group(function (){
        Route::get('dashboard','dashboardView')->name('dashboardView');
    });

    Route::controller(SkillController::class)->group(function (){
        Route::get('skills','skillView')->name('skillView');
        Route::post('skills','store')->name('skill.store');
        Route::patch('skills/update/{skill}','update')->name('skill.update');
        Route::get('skills/{skill}','getSkillById')->name('skill.getSkillById');
        Route::patch('skills/statusChangeById','skillStatusChangeById')->name('skill.skillStatusChangeById');
        Route::delete('skills/skillDeleteById','skillDeleteById')->name('skill.skillDeleteById');

    });
});
