<?php

use App\Http\Controllers\ChildUser\StudentController;
use App\Http\Controllers\ChildUser\TeacherController;
use App\Http\Controllers\UserRole\UserRoleController;
use App\Http\Controllers\UserSettings\AdminTableController;
use App\Http\Controllers\UserSettings\StudentTableControllre;
use App\Http\Controllers\UserSettings\TeacherTableController;
use App\Http\Controllers\UserSettings\UserSettingsController;
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
    Route::post('/update/{id}', 'updateRole');
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

// User Behaviors
// Route::prefix('students')->controller(StudentTableController::class)->group(function () {
//     Route::get('/all', 'studentTable');
//     Route::group(['prefix' => 'access'], function () {
//         Route::post('/active/{id}', 'activeStudent');
//         Route::post('/deactivate/{id}', 'deactivateStudent');
//     });
// });
// Route::prefix('teachers')->controller(TeacherTableController::class)->group(function () {
//     Route::get('/all', 'teacherTable');
//     Route::group(['prefix' => 'access'], function () {
//         Route::post('/active/{id}', 'activeTeacher');
//         Route::post('/deactivate/{id}', 'deactivateTeacher');
//     });
// });
// Route::prefix('admins')->controller(AdminTableController::class)->group(function () {
//     Route::get('/all', 'adminTable');
//     Route::group(['prefix' => 'access'], function () {
//         Route::post('/active/{id}', 'activeAdmin');
//         Route::post('/deactivate/{id}', 'deactivateAdmin');
//     });
// });
 Route::group(['prefix' => 'users'], function () {
        Route::group(['prefix' => 'activate'], function () {
            Route::get('/students', [UserSettingsController::class, 'allStudents']);
            Route::get('/teachers', [UserSettingsController::class, 'allTeachers']);
            Route::get('/admins', [UserSettingsController::class, 'allAdmins']);
        });
        Route::group(['prefix' => 'deactivate'], function () {
            Route::get('/students', [UserSettingsController::class, 'deactivateStudents']);
            Route::get('/teachers', [UserSettingsController::class, 'deactivateTeachers']);
            Route::get('/admins', [UserSettingsController::class, 'deactivateAdmins']);
        });
        Route::group(['prefix' => 'access'], function () {
            Route::post('/active/{id}', [UserSettingsController::class, 'activeUser']);
            Route::post('/deactivate/{id}', [UserSettingsController::class, 'deactivateUser']);
        });
    });


