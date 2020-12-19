<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/home', '/', 301);

Route::get('/email/verify', [VerificationController::class, "notice"])->name("verification.notice");
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, "verify"])->name("verification.verify");
Route::post('/email/verification-notification', [VerificationController::class, "resend"])->name("verification.resend");

Route::get('/forgot-password', [ForgotPasswordController::class, "showLinkRequestForm"])->name("password.request");
Route::post('/forgot-password', [ForgotPasswordController::class, "sendResetLinkEmail"])->name("password.email");
Route::get('/reset-password', [ResetPasswordController::class, "showResetPasswordForm"])->name("password.reset");
Route::post('/reset-password', [ResetPasswordController::class, "resetPassword"])->name("password.update");

Route::get('/', [MainController::class, "home"])->name("main.home");
Route::get('/about', [MainController::class, "about"])->name("main.about");


Route::get('/login', [LoginController::class, "index"])->name("auth.login");
Route::post('/login', [LoginController::class, "store"]);

Route::post('/logout', [LogoutController::class, "store"])->name("auth.logout");

Route::get('/register', [RegisterController::class, "index"])->name("auth.register");
Route::post('/register', [RegisterController::class, "store"]);

Route::get('/users/{user}', [UserController::class, "show"])->name("users.show");
Route::get('/accounts/{user}/edit', [UserController::class, "edit"])->name("users.edit");
Route::put('/accounts/{user}', [UserController::class, "update"])->name("users.update");

Route::get('/posts/create', [PostController::class, "create"])->name("posts.create");
Route::get('/posts/{post}', [PostController::class, "show"])->name("posts.show");
Route::get('/posts/{post}/edit', [PostController::class, "edit"])->name("posts.edit");
Route::post('/posts', [PostController::class, "store"])->name("posts.store");
Route::put('/posts/{post}', [PostController::class, "update"])->name("posts.update");
Route::delete('/posts/{post}', [PostController::class, "destroy"])->name("posts.destroy");



