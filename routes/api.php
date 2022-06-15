<?php

use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\EmployeeController;
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
Route::post('/employees/store', [EmployeeController::class, 'store'])->name('employee:store');
Route::get('/employees/show/{employee}', [EmployeeController::class, 'show'])->name('employee:show');
Route::put('/employees/update/{employee}', [EmployeeController::class, 'update'])->name('employee:update');
Route::delete('/employees/delete/{employee}', [EmployeeController::class, 'delete'])->name('employee:delete');
Route::post('/employees/upload-photo/{employee}', [EmployeeController::class, 'uploadPhoto'])->name('employee:uploadPhoto');

Route::get('/departments/list', [DepartmentController::class, 'index'])->name('department:index');
Route::post('/departments/store', [DepartmentController::class, 'store'])->name('department:store');
Route::get('/departments/show/{department}', [DepartmentController::class, 'show'])->name('department:show');
