<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeController;
use App\Http\Employe;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::controller(EmployeController::class)->group(function () {
    Route::get('/employe', 'index');
    Route::get('/employe/create', 'create');
    Route::get('/employe/{employe}', 'show');
    Route::get('/employe/{employe}/edit', 'edit');
    Route::post('/employe', 'store');
    Route::patch('/employe/{employe}', 'update');
    Route::delete('/employe/{employe}','destroy');
});