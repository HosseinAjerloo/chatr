<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->prefix('login')->name('login.')->group(function (){
    Route::get('',[App\Http\Controllers\Auth\AuthController::class,'index'])->name('index');
    Route::post('',[App\Http\Controllers\Auth\AuthController::class,'login'])->name('login');
});
Route::middleware(['auth'])->name('panel.')->group(function () {
    Route::get('', [App\Http\Controllers\Panel\PanelController::class, 'index'])->name('index');


    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/', [App\Http\Controllers\User\UserController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\User\UserController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\User\UserController::class, 'store'])->name('store');
        Route::get('/edit/{user}', [App\Http\Controllers\User\UserController::class, 'edit'])->name('edit');
        Route::put('/update/{user}', [App\Http\Controllers\User\UserController::class, 'update'])->name('update');
        Route::get('/destroy/{user}', [App\Http\Controllers\User\UserController::class, 'destroy'])->name('destroy');
        Route::post('/export-excel', [App\Http\Controllers\User\UserController::class, 'exportExcel'])->name('export_excel');
    });

    Route::prefix('operator')->name('operator.')->group(function () {
        Route::get('/', [App\Http\Controllers\Operator\OperatorController::class, 'index'])->name('index');
        Route::post('store', [App\Http\Controllers\Operator\OperatorController::class, 'store'])->name('store');
        Route::post('store-prefix', [App\Http\Controllers\Operator\OperatorController::class, 'storePrefix'])->name('storePrefix');
    });


    Route::prefix('config')->name('config.')->group(function () {
        Route::get('', [App\Http\Controllers\Config\ConfigController::class, 'index'])->name('index');
        Route::post('off', [App\Http\Controllers\Config\ConfigController::class, 'off'])->name('off');
        Route::post('upload-baner', [App\Http\Controllers\Config\ConfigController::class, 'uploadBaner'])->name('upload_baner');
        Route::post('upload-dashboard', [App\Http\Controllers\Config\ConfigController::class, 'dashboardBaner'])->name('dashboard_baner');
        Route::post('role-store', [App\Http\Controllers\Config\ConfigController::class, 'roleStore'])->name('role_store');
        Route::post('baner-store', [App\Http\Controllers\Config\ConfigController::class, 'banerStore'])->name('baner_store');
    });


    Route::prefix('upload-excel')->name('upload_excel.')->group(function () {
        Route::get('', [App\Http\Controllers\UoloadExcel\UploadExcelController::class, 'index'])->name('index');
        Route::post('charge-code', [App\Http\Controllers\UoloadExcel\UploadExcelController::class, 'chargeCode'])->name('charge_code');
        Route::post('warrantye', [App\Http\Controllers\UoloadExcel\UploadExcelController::class, 'warrantye'])->name('warrantye');
        Route::post('copen', [App\Http\Controllers\UoloadExcel\UploadExcelController::class, 'copen'])->name('copen');


    });


});
//Route::get('',function (){
//
//});



