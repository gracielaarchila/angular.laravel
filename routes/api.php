<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
 
     /*'middleware' => 'api',estás aplicando el middleware llamado 'api' 
     a todas las rutas definidas en tu archivo de rutas API , un filtro 
     'middleware' => 'auth:api' -> tiene que estar logueado para acceder a cualquier ruta api 
     
     */
    'prefix' => 'auth',
 'middelware' => ['auth:api','role:Super-Admin'],
], function ($router) {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/refresh', [AuthController::class, 'refresh'])->name('refresh');
    Route::post('/me', [AuthController::class, 'me'])->name('me');
    // Route::post('/list', [AuthController::class, 'list']);
});