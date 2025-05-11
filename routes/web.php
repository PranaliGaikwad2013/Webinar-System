<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\Webinar\WebinarController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\UserManagement\UserManagementController;
use App\Http\Controllers\Admin\UserManagement\PermissionManagementController;
use App\Http\Controllers\Admin\UserManagement\RoleManagementController;
use App\Http\Controllers\Frontend\Home\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Admin Controller
Route::get('/admin/dashboard',[AdminController::class, 'admin'])->name('admin');

//Webinar Controller
Route::get('/webinars',[WebinarController::class, 'webinars'])->name('webinar.list');
Route::get('/webinar/create',[WebinarController::class, 'webinarCreate'])->name('webinar.create');
Route::post('/webinar/create',[WebinarController::class, 'webinarStore'])->name('webinar.store');
Route::get('/webinar/{id}/edit', [WebinarController::class, 'editWebinar'])->name('webinar.edit');
Route::post('webinar/{id}/update', [WebinarController::class, 'updateWebinar'])->name('webinar.update');
Route::get('webinar/{id}/delete', [WebinarController::class, 'deleteWebinar'])->name('webinar.delete');


////Category Controller
Route::get('/category/list',[CategoryController::class, 'listCategory'])->name('category.list');
Route::get('/category/create',[CategoryController::class, 'createCategory'])->name('category.create');
Route::post('/category/store',[CategoryController::class, 'storeCategory'])->name('category.store');
Route::get('category/edit/{id}', [CategoryController::class, 'editCategory'])->name('category.edit');
Route::put('category/update/{id}', [CategoryController::class, 'updateCategory'])->name('category.update');
Route::delete('category/delete/{id}', [CategoryController::class, 'deleteCategory'])->name('category.delete');

//////General Setting
Route::get('settings', [GeneralSettingController::class, 'generalSetting'])->name('general.setting');
Route::post('setting',[GeneralSettingController::class, 'store'])->name('general.store');

////User Management Controller
Route::get('/users', [UserManagementController::class, 'indexUser'])->name('users.list');
Route::post('/user/store', [UserManagementController::class, 'storeUser'])->name('user.store');
Route::get('/user/{id}/edit', [UserManagementController::class, 'editUser'])->name('user.edit');
Route::put('/user/{id}/update', [UserManagementController::class, 'updateUser'])->name('user.update');
Route::get('/user/{id}/delete', [UserManagementController::class, 'deleteUser'])->name('user.delete');

//Role Management Controller
Route::get('/role', [RoleManagementController::class, 'indexRole'])->name('roles.list');
Route::post('/role/store', [RoleManagementController::class, 'storeRole'])->name('role.store');
Route::get('/role/{id}/edit', [RoleManagementController::class, 'editRole'])->name('role.edit');
Route::post('/role/{id}/update', [RoleManagementController::class, 'updateRole'])->name('role.update');
Route::get('/role/{id}/delete', [RoleManagementController::class, 'deleteRole'])->name('role.delete');
Route::get('/{id}/permissions', [RoleManagementController::class, 'permissionToRole'])->name('role.permissions');
Route::patch('/{id}/permissions', [RoleManagementController::class, 'updatePermissionToRole'])->name('role.updatePermissions');

///Permission Management Controller
Route::get('/permission', [PermissionManagementController::class, 'indexPermission'])->name('permissions.list');
Route::get('/permission/create', [PermissionManagementController::class, 'createPermission'])->name('permission.create');
Route::post('/permission/store', [PermissionManagementController::class, 'storePermission'])->name('permission.store');
Route::get('/permission/{id}/edit', [PermissionManagementController::class, 'editPermission'])->name('permission.edit');
Route::post('/permission/{id}/update', [PermissionManagementController::class, 'updatePermission'])->name('permission.update');
Route::get('/permission/{id}/delete', [PermissionManagementController::class, 'deletePermission'])->name('permission.delete');

//Home Controller
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/webinar/{id}', [HomeController::class, 'webinarDetails'])->name('webinar.details');
Route::post('/webinar/register/{id}', [HomeController::class, 'register'])->name('webinar.register');

require __DIR__.'/auth.php';
