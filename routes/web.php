<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TaskController;

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
Route::post('/tasks/create', [TaskController::class, 'createTask'])->name('createTask');
Route::get('/todo', [TaskController::class, 'showTasks'])->name('todo');
Route::get('/todo/view/{id}', [TaskController::class, 'viewTask'])->name('viewTask');
Route::post('/todo/edit/{id}', [TaskController::class, 'editTask'])->name('editTask');
Route::post('/todo/delete/{id}', [TaskController::class, 'deleteTask'])->name('deleteTask');
Route::post('/todo/complete/{id}', [TaskController::class, 'completeTask'])->name('completeTask');

Route::get('/laravel', function(){
    return view('welcome');
})->name('laravel');