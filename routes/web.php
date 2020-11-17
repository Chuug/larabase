<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdministratorController;

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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

/* ---------------------------------- Users --------------------------------- */

Route::get('/settings', [UserController::class, 'settings'])->name('user.settings');
Route::patch('/user/update/profile', [UserController::class, 'updateProfile'])->name('user.update.profile');
Route::patch('/user/update/password', [UserController::class, 'updatePassword'])->name('user.update.password');
Route::patch('/user/update/avatar', [UserController::class, 'updateAvatar'])->name('user.update.avatar');

/* ------------------------------ Administrator ----------------------------- */

Route::middleware('can:administration')->group(function(){
    Route::get('/adm', [AdministratorController::class, 'index'])->name('administrator.index');
    Route::get('/adm/manage-users', [AdministratorController::class, 'manageUsers'])->name('administrator.users.manage');
    Route::delete('/adm/delete-user/{id?}', [AdministratorController::class, 'deleteUser'])->name('administrator.users.delete');
    Route::patch('/adm/promote-user/{id?}', [AdministratorController::class, 'promoteUser'])->name('administrator.users.promote');
});

/* ---------------------------------- Blog ---------------------------------- */

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
Route::patch('/blog/update/{id}', [BlogController::class, 'update'])->name('blog.update');
Route::delete('/blog/delete/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');

/* --------------------------------- Comment -------------------------------- */

Route::post('/comment/store/{articleId}', [CommentController::class, 'store'])->name('comment.store');
