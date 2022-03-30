<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('medicines', 'MedicineController');
//mengarahan ke coba1
Route::get('coba1', 'MedicineController@coba1');
Route::get('obattermahal', 'MedicineController@obatMahal');
// routing ajax blup
Route::post('/medicines/showInfo','MedicineController@showInfo')->name('medicines.showInfo');


Route::resource('categories', 'CategoryController');
Route::get('report/listmedicine/{id}','CategoryController@showlist');






