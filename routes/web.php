<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\PortfolioController;

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

//Route::prefix('admin')->name('admin.')->group(function (){
//
//});


Route::name('frontend.')->group(function (){
    Route::controller(PortfolioController::class)->group(function (){
        Route::get('/','viewPortfolio')->name('portfolio.view');
    });
});

