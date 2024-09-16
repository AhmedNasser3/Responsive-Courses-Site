<?php

use App\Http\Controllers\Admin\Courses\CoursesController;
use App\Http\Controllers\Admin\SubCategory\SubCategoryController;
use App\Http\Controllers\Admin\SubCourses\SubCoursesController;
use App\Http\Controllers\Admin\SubSubCategory\SubSubCategoryController;
use App\Http\Controllers\Admin\Video\VideoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UvoloxController;


Route::controller(UvoloxController::class)->group(function(){
Route::get('/', 'dashboard')->name('dashboard');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::controller(SubCategoryController::class)->group(function(){
    Route::get('/subcategory/{sub_category}/{category_slug}',  'index')->name('subcategory.home');
});
Route::controller(SubSubCategoryController::class)->group(function(){
    Route::get('/sub_subcategory/{sub_subcategory}/{user_id}/{sub_subcategory_slug}',  'home')->name('sub_subcategory.home');
});
Route::controller(SubCoursesController::class)->group(function(){
    Route::get('/subcourses/{subcourses}',  'home')->name('subcourses.home');
});


Route::get('/user/courses', [SubCoursesController::class, 'showCourses'])->name('user.courses');

require __DIR__.'/auth.php';
require __DIR__.'/admin.auth.php';
require __DIR__.'/admin-auth.php';
