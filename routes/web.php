<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasswordResetLinkController;
use App\Http\Controllers\NewPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', [HomeController::class, 'show'])->name('home');


Route::middleware('auth')->group(function() {

	Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [ProfileController::class, 'edit']);

	Route::get('/profile/password', [ProfileController::class, 'showChangePassword'])->name('profile.password');
	Route::post('/profile/password', [ProfileController::class, 'changePassword']);

	Route::get('/profile/delete', [ProfileController::class, 'showDelete'])->name('profile.delete');
	Route::post('/profile/delete', [ProfileController::class, 'delete']);

	Route::middleware('ajax')->group(function() {
		Route::get('/folders/create', [FolderController::class, 'showCreateForm'])->name('folders.create');
		Route::post('/folders/create', [FolderController::class, 'create']);
	});

	Route::get('/folders/tasks', [TaskController::class, 'first_index'])->name('tasks.first_index');

	Route::middleware('can:view,folder')->group(function() {

		Route::get('/folders/{folder}/tasks', [TaskController::class, 'index'])->name('tasks.index');

		Route::post('/folders/{folder}/delete', [FolderController::class, 'delete']);
		Route::post('/folders/{folder}/tasks/{task}/delete', [TaskController::class, 'delete']);

		Route::middleware('ajax')->group(function() {
			Route::get('/folders/{folder}/tasks/create', [TaskController::class, 'showCreateForm'])->name('tasks.create');
			Route::post('/folders/{folder}/tasks/create', [TaskController::class, 'create']);

			Route::get('/folders/{folder}/tasks/{task}/edit', [TaskController::class, 'showEditForm'])->name('tasks.edit');
			Route::post('/folders/{folder}/tasks/{task}/edit', [TaskController::class, 'edit']);

			Route::get('/folders/{folder}/tasks/{task}/delete', [TaskController::class, 'showDeleteForm'])->name('tasks.delete');

			Route::get('/folders/{folder}/edit', [FolderController::class, 'showEdit'])->name('folders.edit');
			Route::post('/folders/{folder}/edit', [FolderController::class, 'edit']);

			Route::get('/folders/{folder}/delete', [FolderController::class, 'showDelete'])->name('folders.delete');
		});

	});

	Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware('guest')->group(function() {
	Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
	Route::post('/register', [RegisterController::class, 'create']);
	Route::get('/forgot-password', [PasswordResetLinkController::class, 'show'])->name('password.request');
	Route::post('/forgot-password', [PasswordResetLinkController::class, 'send'])->name('password.email');
	Route::get('/reset-password/{token}', [NewPasswordController::class, 'show'])->name('password.reset');
	Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.store');
	Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
	Route::post('/login', [AuthController::class, 'login']);
});

