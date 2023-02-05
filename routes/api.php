<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ChartererController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('companies')->group(function () {
    Route::get('', [CompanyController::class, 'index']);
    Route::get('{uuid}', [CompanyController::class, 'show']);
    Route::post('company', [CompanyController::class, 'store']);
    Route::put('{id}', [CompanyController::class, 'update']);
    Route::delete('{id}', [CompanyController::class, 'delete']);
});

Route::prefix('charterers')->group(function () {
    Route::get('/', [ChartererController::class, 'index']);
});
