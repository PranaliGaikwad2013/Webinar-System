<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\Webinar\WebinarController;
use App\Http\Controllers\Admin\Category\CategoryController;
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
//Home Controller
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/webinar/{id}', [HomeController::class, 'webinarDetails'])->name('webinar.details');
Route::post('/webinar/register/{id}', [HomeController::class, 'register'])->name('webinar.register');

require __DIR__.'/auth.php';
