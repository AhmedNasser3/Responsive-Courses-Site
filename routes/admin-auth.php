<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\Admin\Hero\HeroController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Video\VideoController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\SubCourses\SubCoursesController;
use App\Http\Controllers\Admin\SubCategory\SubCategoryController;
use App\Http\Controllers\Admin\CoursesVisible\CoursesVisibleController;
use App\Http\Controllers\Admin\SubSubCategory\SubSubCategoryController;

Route::prefix('admin')->middleware('guest:admin')->group(function () {

    Route::get('register', [AdminRegisterController::class, 'create'])->name('admin.register');
    Route::post('register', [AdminRegisterController::class, 'store']);

    Route::get('login', [LoginController::class, 'create'])->name('admin.login');
    Route::post('login', [LoginController::class, 'store']);

});

Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::post('logout', [LoginController::class, 'destroy'])->name('admin.logout');

    // ============================== Hero ==============================
    Route::controller(HeroController::class)->group(function(){
        Route::get('/dashboard', 'dashboard')->name('admin.dashboard');
        Route::get('/hero', 'index')->name('hero.index');
        Route::get('/hero/create', 'create')->name('hero.create');
        Route::post('/hero/store', 'store')->name('hero.store');
        Route::get('/hero/{hero}/edit', 'edit')->name('hero.edit');
        Route::get('/hero/{hero}/update', 'update')->name('hero.update');
        Route::delete('/hero/{hero}', 'delete')->name('hero.delete');
    });
    // ============================== Hero end ==============================





    // ============================== Category ==============================
    Route::controller(CategoryController::class)->group(function(){
        Route::get('/category', 'CategoryView')->name('category.index');
        Route::get('/category/create', 'CategoryCreate')->name('category.create');
        Route::post('/category/store', 'CategoryStore')->name('category.store');
        Route::get('/category/{category}/edit', 'CategoryEdit')->name('category.edit');
        Route::get('/category/{category}/update', 'CategoryUpdate')->name('category.update');
        Route::delete('/category/{category}', 'CategoryDelete')->name('category.delete');
    });
    // ============================== Category end ==============================


    // ============================== SubCategory ==============================
    Route::controller(SubCategoryController::class)->group(function(){
        Route::get('/subcategory', 'SubCategoryView')->name('subcategory.index');
        Route::get('/subcategory/create', 'SubCategoryCreate')->name('subcategory.create');
        Route::post('/subcategory/store', 'SubCategoryStore')->name('subcategory.store');
        Route::get('/subcategory/{subcategory}/edit', 'SubCategoryEdit')->name('subcategory.edit');
        Route::get('/subcategory/{subcategory}/update', 'SubCategoryUpdate')->name('subcategory.update');
        Route::delete('/subcategory/{subcategory}', 'SubCategoryDelete')->name('subcategory.delete');
    });
    // ============================== SubCategory end ==============================



    // ============================== Sub SubCategory ==============================
    Route::controller(SubSubCategoryController::class)->group(function(){
        Route::get('/sub_subcategory', 'index')->name('sub_subcategory.index');
        Route::get('/sub_subcategory/create', 'create')->name('sub_subcategory.create');
        Route::post('/sub_subcategory/store', 'store')->name('sub_subcategory.store');
        Route::get('/sub_subcategory/{sub_subcategory}/edit', 'edit')->name('sub_subcategory.edit');
        Route::get('/sub_subcategory/{sub_subcategory}/update', 'update')->name('sub_subcategory.update');
        Route::delete('/sub_subcategory/{sub_subcategory}', 'delete')->name('sub_subcategory.delete');
    });
    // ============================== Sub SubCategory end ==============================

    // ============================== Video CRUD ==============================

Route::controller(SubCoursesController::class)->group(function(){
    Route::get('/video', 'index')->name('video.index');
    Route::get('/subcourses/create', 'create')->name('subcourses.create');
    Route::post('/subcourses/store', 'store')->name('subcourses.store');
    Route::get('/subcourses/{subcourses}/edit', 'edit')->name('subcourses.edit');
    Route::get('/subcourses/{subcourses}/update', 'update')->name('subcourses.update');
    Route::delete('/subcourses/{subcourses}', 'delete')->name('subcourses.delete');
});
    // ============================== Video CRUD end ==============================
    Route::get('/index', [CoursesVisibleController::class, 'index'])->name('admin.index');
    Route::get('/index/{user_id}', [CoursesVisibleController::class, 'show_courses'])->name('admin.show');
// تحديث حالة الرؤية باستخدام PUT
Route::put('/visibility/update/{course_id}', [CoursesVisibleController::class, 'updateVisibility'])->name('admin.update-visibility');
});
