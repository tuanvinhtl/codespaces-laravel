<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ChartererController;
use App\Http\Controllers\Auth\LoginController;

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

Route::post('auth/login', [LoginController::class, 'authenticate']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::group(
        ['prefix' => 'companies'],
        function () {
            Route::get('', [CompanyController::class, 'index']);
            Route::get('{uuid}', [CompanyController::class, 'show']);
            Route::post('filter', [CompanyController::class, 'filter']);
            Route::post('/company', [CompanyController::class, 'store']);
            Route::put('{uuid}', [CompanyController::class, 'update']);
            Route::delete('{uuid}', [CompanyController::class, 'destroy']);
        }
    );

    Route::group(
        ['prefix' => 'charterers'],
        function () {
            Route::get('/', [ChartererController::class, 'index']);
            Route::get('{uuid}', [ChartererController::class, 'show']);
            Route::post('filter', [ChartererController::class, 'filter']);
            Route::post('/company', [ChartererController::class, 'store']);
            Route::put('{uuid}', [ChartererController::class, 'update']);
            Route::delete('{uuid}', [ChartererController::class, 'destroy']);
        }
    );
});
