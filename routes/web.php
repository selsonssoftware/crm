<?php




use App\Http\Controllers\CrmController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\departmentController;
use App\Http\Controllers\EmployeeDetailsController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\PayrollController;
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


Route::get('/invoice', function () {
    return view('sales.invoice');
})->name('invoice');

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


//Tickets
Route::get('/show_tickets',[TicketController::class,'show_tickets'])->name('tickets.index');;
Route::post('/store_tickets',[TicketController::class,'store_tickets']);



Route::get('/ticket_details/{ticket_id}', [TicketController::class, 'ticket_details'])
    ->name('ticket.details');


Route::post('/ticket_update/{ticket_id}', [TicketController::class, 'db_tickect'])->name('ticket.update');

Route::post('/ticket_update/{ticket_id}', [TicketController::class, 'db_tickect'])
    ->name('ticket.update');

//Contacts

Route::get('/contact', [CrmController::class, 'index']);
Route::post('/storecontact', [CrmController::class, 'store']);
Route::put('/contacts/{id}', [CrmController::class, 'update'])->name('contacts.update');
Route::get('/deletecontact/{id}', [CrmController::class, 'destroy'])->name('contact.delete');



//Companies

Route::get('/company',[CrmController::class, 'companies']);
Route::post('/addcompany', [CrmController::class, 'company']);
Route::put('/companies/{id}', [CrmController::class, 'updated'])->name('company.updated');
Route::get('/deletecompany/{id}', [CrmController::class, 'delete'])->name('company.delete');
Route::get('/company', [CrmController::class, 'companies'])->name('companies.companyindex');



//holidays
Route::get('/holidays',[HolidayController::class,'holidays']);
Route::post('/holidaysstore',[HolidayController::class,'holidaysstore']);
Route::post('/holidayssave', [HolidayController::class,'holidayssave']);
Route::get('/delete_holidays',[HolidayController::class,'delete_holidays']);

//promotions
Route::get('/promotions',[PromotionController::class,'promotions']);
Route::post('/promotionsstore',[PromotionController::class,'promotionsstore']);
Route::post('/promotionssave', [PromotionController::class,'promotionssave']);
Route::get('/delete_promotions',[PromotionController::class,'delete_promotions']);


//PAYROLL
Route::get('/employee_salary',[PayrollController::class,'employee_salary'])->name('payroll.salary');
Route::post('/store_employee_salary',[PayrollController::class,'store_employee_salary']);
Route::get('/delete_employee_salary',[PayrollController::class,'delete_employee_salary']);
Route::post('/db_employee_salary', [PayrollController::class,'db_employee_salary']);


//PAYSLIPS
Route::get('/view_payslips/{payroll_id}',[PayrollController::class,'view_payslips'])->name('payslip.data');


//Invoice
Route::get('/view_invoice',[InvoiceController::class,'view_invoice'])->name('show');
Route::get('/delete_invoice',[InvoiceController::class,'delete_invoice']);

// Route::get('/invoice_details',[InvoiceController::class,'invoice_details']);
Route::get('/edit_invoice',[InvoiceController::class,'edit_invoice']);
Route::post('/updated_invoice', [InvoiceController::class, 'updated_invoice']);
Route::get('/download_invoice/{invoice_id}', [InvoiceController::class, 'download_invoice']);



Route::get('/add_invoice',[InvoiceController::class,'add_invoice']);
Route::post('/store_invoice', [InvoiceController::class,'store_invoice']);
