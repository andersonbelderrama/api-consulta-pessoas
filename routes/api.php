<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsultaController;

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

// Public routes
Route::post('/login', [, 'login']);


// Protected routes
Route::middleware('auth:sanctum')->group(function(){
    Route::post('/consulta_nome', [ConsultaController::class, 'consulta_nome']);
    Route::post('/consulta_documento', [ConsultaController::class, 'consulta_documento']);
});


