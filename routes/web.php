<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\TeacherController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


 // Slider routes
 Route::group(['prefix' => 'Slider'], function () {
    Route::get('manage', [SliderController::class, 'index'])->name('slider.manage');
    // Route::get('create', [SliderController::class, 'create'])->name('slider.create');
    Route::post('store', [SliderController::class, 'store'])->name('slider.store');
    Route::get('edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
    Route::post('update/{id}', [SliderController::class, 'update'])->name('slider.update');
    Route::get('destroy/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');
});

 // teacher routes
 Route::group(['prefix' => 'Teacher'], function () {
    Route::get('manage', [TeacherController::class, 'index'])->name('teacher.manage');
    // Route::get('create', [SliderController::class, 'create'])->name('slider.create');
    Route::post('store', [TeacherController::class, 'store'])->name('teacher.store');
    Route::get('edit/{id}', [TeacherController::class, 'edit'])->name('teacher.edit');
    Route::post('update/{id}', [TeacherController::class, 'update'])->name('teacher.update');
    Route::get('destroy/{id}', [TeacherController::class, 'destroy'])->name('teacher.destroy');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
