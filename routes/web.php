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
Route::resource('categories', 'CategoryController');
Route::resource('medicines', 'MedicineController');
//mengarahan ke coba1
Route::get('coba1', 'MedicineController@coba1');
Route::get('obattermahal', 'MedicineController@obatMahal');
// routing ajax blup
Route::post('/medicines/showInfo','MedicineController@showInfo')->name('medicines.showInfo');

Route::get('report/listmedicine/{id}','CategoryController@showlist');

//week 8
Route::resource('transactions', 'TransactionController');
Route::post('transactions/showDataAjax', 'TransactionController@showAjax')
            ->name('transaction.showAjax');
Route::get('transactions/showDataAjax2/{id}', 'TransactionController@showAjax2')
            ->name('transaction.showAjax2');

//Week 9
Route::resource('suppliers', 'SupplierController');

// Week 11
// Routing untuk getEditForm
Route::post('suppliers/getEditForm','SupplierController@getEditForm')->name('suppliers.getEditForm');
Route::post('suppliers/getEditForm2','SupplierController@getEditForm2')->name('suppliers.getEditForm2');
Route::post('suppliers/deleteData','SupplierController@deleteData')->name('suppliers.deleteData');
Route::post('suppliers/saveData','SupplierController@saveData')->name('suppliers.saveData');






