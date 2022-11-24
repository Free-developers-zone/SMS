<?php

use App\Http\Controllers\ChildUser\StudentController;
use App\Http\Controllers\ChildUser\TeacherController;
use App\Http\Controllers\UserRole\UserRoleController;
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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
// user role
Route::prefix('role')->controller(UserRoleController::class)->group(function () {
    Route::get('/', 'getRole');
    Route::post('/create', 'createRole');
    Route::put('/update/{id}', 'updateRole');
    Route::delete('/{id}/delete', 'deleteRole');
});
// student
Route::prefix('student')->controller(StudentController::class)->group(function () {
    Route::post('/create', 'create');
    Route::get('/{id}/get', 'getData');
    Route::post('/update/{id}', 'update');
    Route::post('/update/info/{id}', 'updateInfo');
    Route::post('/update/guardian/{id}', 'updateGuardian');
    Route::delete('/delete/{id}', 'delete');
});
// teacher
Route::prefix('teacher')->controller(TeacherController::class)->group(function () {
    Route::post('/create', 'create');
    Route::get('/{id}/get', 'getData');
    Route::post('/update/{id}', 'update');
    Route::post('/update/info/{id}', 'updateInfo');
    Route::post('/update/other/{id}', 'updateOther');
    Route::delete('/delete/{id}', 'delete');
});
// administration
Route::prefix('administration')->controller(AdministrationController::class)->group(function () {
    Route::post('/create', 'create');
    Route::get('/{id}/get', 'getData');
    Route::post('/update/{id}', 'update');
    Route::post('/update/info/{id}', 'updateInfo');
    Route::post('/update/other/{id}', 'updateOther');
    Route::delete('/delete/{id}', 'delete');
});
// school
Route::prefix('school')->controller(SchoolController::class)->group(function () {
    Route::post('/create', 'create');
    Route::get('/{id}/get', 'getData');
    Route::post('/update/{id}', 'update');
    Route::delete('/delete/{id}', 'delete');
});

