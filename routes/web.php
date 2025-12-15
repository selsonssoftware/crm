<?php

use App\Http\Controllers\CrmController;
use Illuminate\Support\Facades\Route;

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

Route::get('/contact', [CrmController::class, 'index']);
Route::post('/storecontact', [CrmController::class, 'store']);
Route::put('/contacts/{id}', [CrmController::class, 'update'])->name('contacts.update');
Route::get('/deletecontact/{id}', [CrmController::class, 'destroy'])->name('contact.delete');

Route::get('/company',[CrmController::class, 'companies']);
Route::post('/addcompany', [CrmController::class, 'company']);
Route::put('/companies/{id}', [CrmController::class, 'updated'])->name('company.updated');
Route::get('/deletecompany/{id}', [CrmController::class, 'delete'])->name('company.delete');
Route::get('/company', [CrmController::class, 'companies'])->name('companies.companyindex');


