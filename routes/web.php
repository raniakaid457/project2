<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;

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


Route::get('/',[PageController::class, 'ViewLoginPageController']);

Route::post('/handle-login',[LoginController::class, 'HandleLoginContoller']);

Route::get('/view-home-page',[PageController::class, 'ViewHomePageController']);

Route::get('/handle-logout',[LoginController::class, 'HandleLogoutContoller']);

Route::get('/view-staff-management-index',[PageController::class, 'ViewStaffManagementIndexController']);

Route::post('/insert-staff-data',[HomeController::class, 'InsertStaffData']);

Route::get('/delete-staff-data/{id}',[HomeController::class, 'DeleteStaffData']);

Route::get('/view-staff-management-edit/{id}',[PageController::class, 'ViewStaffManagementEditController']);

Route::post('/update-staff-data',[HomeController::class, 'UpdateStaffData']);

Route::get('/view-settings-index',[PageController::class, 'ViewSettingsPageContoller']);

Route::post('/change-password',[HomeController::class, 'ChangePassword']);

Route::get('/view-user-accounts-index',[PageController::class, 'ViewUserAccountsIndexContoller']);

Route::get('/delete-user-account/{id}',[HomeController::class, 'DeleteUserAccount']);

Route::get('/view-edit-user-account/{id}',[PageController::class, 'ViewEditUserAccount']);

Route::post('/edit-user-account',[HomeController::class, 'EditUserAccount']);

Route::post('/insert-user-accounts',[HomeController::class, 'InsertUserAccount']);

Route::get('/accept-request/{id}',[HomeController::class, 'AcceptRequest']);

Route::get('/decline-request/{id}',[HomeController::class, 'DeclineRequest']);

Route::get('/view-home-page-of-staff-account',[PageController::class, 'ViewHomePageOfStaffAccountController']);

Route::get('/view-settings-index-of-staff-account',[PageController::class, 'ViewSettingsPageOfStaffAccountContoller']);

Route::post('/change-password-of-staff-account',[HomeController::class, 'ChangePasswordOfStaffAccount']);

Route::post('/insert-leave-data-of-staff-account',[HomeController::class, 'InsertLeavesDataOfStaffAccount']);

Route::get('/delete-leave-pending-request-in-staff-account/{id}',[HomeController::class, 'DeleteLeavePendingRequestInStaffAccount']);

Route::get('/view-my-leave-history-of-staff-account',[PageController::class, 'ViewMyLeaveHistoryPageOfStaffAccountController']);
?>
