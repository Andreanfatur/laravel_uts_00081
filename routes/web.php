<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerPendaftar;
use App\Http\Middleware\AuthLogin;
use App\Http\Middleware\HasLogin;

Route::get('/', [ControllerPendaftar::class, 'home']);

Route::group(["middleware" => [HasLogin::class]], function () {
    Route::get('/register', [ControllerPendaftar::class, 'register']);
    Route::get('/login', [ControllerPendaftar::class, 'login']);
    Route::post('/register', [ControllerPendaftar::class, 'store']);
    Route::post('/login', [ControllerPendaftar::class, 'Masuk']);
});

Route::post("/diterima", [ControllerPendaftar::class, "diterima"]);
Route::post("/batalkan", [ControllerPendaftar::class, "batalkan"]);

Route::group(['middleware' => [AuthLogin::class]], function () {
    Route::get('/dashboard', [ControllerPendaftar::class, 'dashboard']);
    Route::get("/logout", [ControllerPendaftar::class, "logout"]);
});
