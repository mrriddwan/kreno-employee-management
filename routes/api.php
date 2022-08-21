<?php

use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\DepartmentRolesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/employees/index', [EmployeeController::class, 'index'])->name('employee:index');
Route::get('/employees/list', [EmployeeController::class, 'list'])->name('employee:list');
Route::post('/employees/store', [EmployeeController::class, 'store'])->name('employee:store');
Route::get('/employees/show/{employee}', [EmployeeController::class, 'show'])->name('employee:show');
Route::put('/employees/update/{employee}', [EmployeeController::class, 'update'])->name('employee:update');
Route::delete('/employees/delete/{employee}', [EmployeeController::class, 'delete'])->name('employee:delete');
Route::post('/employees/upload-photo/{employee}', [EmployeeController::class, 'uploadPhoto'])->name('employee:uploadPhoto');

Route::get('/departments/index', [DepartmentController::class, 'index'])->name('department:index');
Route::get('/departments/list', [DepartmentController::class, 'list'])->name('department:index');
Route::post('/departments/store', [DepartmentController::class, 'store'])->name('department:store');
Route::get('/departments/show/{department}', [DepartmentController::class, 'show'])->name('department:show');
Route::delete('/departments/delete/{department}', [DepartmentController::class, 'delete'])->name('department:delete');
Route::post('/departments/upload-photo/{department}', [DepartmentController::class, 'uploadPhoto'])->name('department:uploadPhoto');


Route::get('/roles/index', [DepartmentRolesController::class, 'index']);
Route::post('/roles/store', [DepartmentRolesController::class, 'store']);
Route::get('/roles/show/{role}', [DepartmentRolesController::class, 'show'])->name('role:show');
Route::delete('/roles/delete/{role}', [DepartmentRolesController::class, 'delete']);
Route::get('/roles/selectRole', [DepartmentRolesController::class, 'selectRole']);
