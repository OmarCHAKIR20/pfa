<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FullCalenderController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function() { 
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});

Route::group(['middleware' => ['auth' , 'role:administrator']], function() { 
    Route::get('/calender', 'App\Http\Controllers\DashboardController@deletePoste')->name('dashboard.calender');
});

Route::group(['middleware' => ['auth' , 'role:docteur']], function() { 
    Route::get('fullcalender', [FullCalenderController::class, 'index'])->name('calender');
    Route::post('fullcalenderAjax', [FullCalenderController::class, 'ajax']);
});



require __DIR__.'/auth.php';
