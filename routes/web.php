<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PesanController;
use Illuminate\Support\Facades\Route;

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



Route::get('/', [BlogController::class, 'index'])->name('home');
Route::get('/search', [BlogController::class, 'search'])->name('search');



// auth routes
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/login', function(){
  return view('admin.page.back');
});
Route::get('/data/user', [AuthController::class, 'dataUser'])->name('admin.user');
Route::post('/delete/user/{id}', [AuthController::class, 'deleteUser'])->name('delete.user');

// route admin dashboard (hanya admin yang bisa akses)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::post('/admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::get('/admin/show/{id}', [AdminController::class, 'show'])->name('admin.show');
    Route::delete('/admin/delete/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::get('/admin/pesan', [AdminController::class, 'showPesan'])->name('admin.pesan');
});



Route::get('/category/{category}', [BlogController::class, 'filterByCategory'])->name('category');
Route::get('/detail/{id}', [BlogController::class, 'show'])->name('detail');
Route::get('/tentang', [BlogController::class, 'tentang'])->name('tentang');
// comment
Route::post('/comments/{blog}', [CommentController::class, 'store'])->middleware('auth')->name('comments.store');
Route::post('/comments/{id}/update', [CommentController::class, 'update'])->name('comments.update');
// Route to show the edit comment form
Route::get('/comments/edit/{id}', [CommentController::class, 'edit'])->name('comments.edit');
Route::post('/comments/delete/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::post('/pesan', [PesanController::class, 'submit'])->name('contact.submit');
Route::post('/pesan/delete/{id}', [PesanController::class, 'destroy'])->name('contact.destroy');