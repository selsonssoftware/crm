<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\departmentController;
use App\Http\Controllers\EmployeeDetailsController;
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

Route::get('/layout', function () {
    return view('example');
});

Route::get('/', function () {
    return view('Dashboard.dashboard');
});

//UserManagementController
 Route::get('/user_details',[UserManagementController::class,'usermanagememnt'])->name('store.user');
// Route::post('/user_information',[UserManagementController::class,'userinformation']);
// Route::post('/employee_db',[UserManagementController::class,'employeedb']);
// Route::get('/delete_employee',[UserManagementController::class,'delete_employee']);

//Employee
Route::get('/employee_list',[EmployeeDetailsController::class,'show_employee']);
Route::post('/user_information',[EmployeeDetailsController::class,'userinformation']);
Route::post('/employee_db',[EmployeeDetailsController::class,'employeedb']);
Route::get('/delete_employee',[EmployeeDetailsController::class,'delete_employee']);


//ProjectController
Route::get('/show_project',[ProjectController::class,'show_project']);
Route::post('/store_project',[ProjectController::class,'store_project']);
Route::post('/project_db',[ProjectController::class,'project_db']);
Route::get('/delete_project',[ProjectController::class,'delete_project']);



//Tasks
Route::get('/show_tasks',[ProjectController::class,'show_tasks']);
Route::post('/store_tasks',[ProjectController::class,'store_tasks']);
Route::post('/task_db',[ProjectController::class,'task_db']);
Route::get('/delete_task',[ProjectController::class,'delete_task']);


//departments
Route::get('/departments',[departmentController::class,'testing']);
Route::post('/departmentsstore',[departmentController::class,'departmentsstore']);
Route::post('/departmentssave', [departmentController::class,'departmentssave']);
Route::get('/delete_departments',[departmentController::class,'delete_departments']);

//designations
Route::get('/designations',[departmentController::class,'testing']);
Route::post('/designationsstore',[departmentController::class,'designationsstore']);
Route::post('/designationssave', [departmentController::class,'designationssave']);
Route::get('/delete_designations',[departmentController::class,'delete_designations']);
