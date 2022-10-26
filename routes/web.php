<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

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

Route::get('/', [EmployeeController::class, 'showEmployees'])->name('home');
Route::post('/employees/order', [EmployeeController::class, 'orderedEmployees'])->name('order');
Route::post('/employees/create', [EmployeeController::class, 'saveEmployee'])->name('createEmployee');
Route::get('/employees/view/{employee_id}', [EmployeeController::class, 'viewEmployee'])->name('viewEmployee');
Route::post('/employees/edit/{employee_id}', [EmployeeController::class, 'editEmployee'])->name('editEmployee');
Route::post('/employees/delete/{employee_id}', [EmployeeController::class, 'deleteEmployee'])->name('deleteEmployee');
Route::post('/employees/search', [EmployeeController::class, 'searchEmployee'])->name('searchEmployee');
Route::get('/laravel', function(){
    return view('welcome');
})->name('laravel');