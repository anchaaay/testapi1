<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\CourseController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// middleware => 'auth' hanya untuk web

Route::group(['middleware' => ['auth:sanctum']], function () { //berlaku pake token, sebagai penengah
    Route::get('/me', [AuthController::class, 'me']); //butuh token
    Route::post('/logout', [AuthController::class, 'logout']); //butuh token

    Route::post('/absen', [CourseController::class, 'absen']);

    });

