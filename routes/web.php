<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookBorrowController;
use App\Http\Controllers\BookReturnController;
use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\BookCategoryController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/admin-dashboard', [DashboardController::class, 'index'])->name('index.dashboard');
Route::get('/teacher-dashboard', [DashboardController::class, 'teacher'])->name('teacher.dashboard');
Route::get('/student-dashboard', [DashboardController::class, 'student'])->name('student.dashboard');
Route::get('/librarian-dashboard', [DashboardController::class, 'librarian'])->name('librarian.dashboard');
Route::get('/parent-dashboard', [DashboardController::class, 'parent'])->name('parent.dashboard');

// book categories
Route::controller(BookCategoryController::class)->group(function () {
    Route::get('book-category/', 'index');
    Route::get('book-category/add', 'create');
});

// books
Route::controller(BookController::class)->group(function () {
    Route::get('book/', 'index');
    Route::get('book/add', 'create');
});

// borrow book
Route::controller(BookBorrowController::class)->group(function () {
    Route::get('book-borrow/', 'index');
    Route::get('book-borrow/add-borrow', 'create');
});

// return book
Route::controller(BookReturnController::class)->group(function () {
    Route::get('book-return/', 'index');
    Route::get('book-return/add-return', 'create');
});

Route::resource('/curriculum', CurriculumController::class);
Route::put('curriculum/{id}', [CurriculumController::class, 'update'])->name('curriculum.update');

