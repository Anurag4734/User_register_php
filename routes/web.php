<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;



// Route::get('/', function () {
//     return view('dashboard');
// });
// Route::get('/login', function () {
//     return view('login');
// });
// Route::get('/register', function () {
//     return view('register');
// });

Route::get("/", [UserController::class, 'index'])->name("home")->middleware(['auth']);
Route::get("/login", [UserController::class, 'handleLogin'])->name("login");
Route::get("/register", [UserController::class, 'handleRegister'])->name("register");
Route::post("/register", [UserController::class, 'registerUser'])->name("registerUser");
Route::post("/login", [UserController::class, 'login'])->name("login");
Route::get("/logout", [UserController::class, 'logout'])->name("logout");