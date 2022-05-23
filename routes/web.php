<?php
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

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
    return view('home');
});

// Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
// Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store']);
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

//Companies
Route::get('admin/companies', [CompanyController::class, 'index'])->middleware('auth');
Route::delete('admin/companies/{company}', [CompanyController::class, 'destroy'])->middleware('auth');

Route::get('admin/companies/{company}/edit', [CompanyController::class, 'edit'])->middleware('auth');
Route::patch('admin/companies/{company}', [CompanyController::class, 'update'])->middleware('auth');

Route::get('admin/companies/create', [CompanyController::class, 'create'])->middleware('auth');
Route::post('admin/companies', [CompanyController::class, 'store'])->middleware('auth');

//Employees
Route::get('admin/employees', [EmployeeController::class, 'index'])->middleware('auth');
Route::delete('admin/employees/{employee}', [EmployeeController::class, 'destroy'])->middleware('auth');

Route::get('admin/employees/{employee}/edit', [EmployeeController::class, 'edit'])->middleware('auth');
Route::patch('admin/employees/{employee}', [EmployeeController::class, 'update'])->middleware('auth');

Route::get('admin/employees/create', [EmployeeController::class, 'create'])->middleware('auth');
Route::post('admin/employees', [EmployeeController::class, 'store'])->middleware('auth');
