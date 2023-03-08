<?php

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

Route::controller(App\Http\Controllers\Api\AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('logout', 'logout');
        Route::post('refresh', 'refresh');
    });
});

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(App\Http\Controllers\Api\AuditController::class)->group(function () {
        Route::get('/audits', 'index');
        Route::get('/me/audits', 'me');
        Route::get('/lead/audits', 'lead')->middleware('role:Auditor');
    });

    Route::controller(App\Http\Controllers\Api\BlockchainController::class)->prefix('blockchains')->group(function () {
        Route::get('/', 'index');
    });

    Route::controller(App\Http\Controllers\Api\CategoryController::class)->prefix('categories')->group(function () {
        Route::get('/', 'index');
    });

    Route::controller(App\Http\Controllers\Api\IssueController::class)->prefix('issues')->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('/{id}', 'show');
        Route::post('/{id}', 'update');
        Route::delete('/{id}', 'destroy');
    });

    Route::controller(App\Http\Controllers\Api\RoleController::class)->prefix('roles')->group(function () {
        Route::get('/', 'index');
    });

    Route::controller(App\Http\Controllers\Api\SkillController::class)->prefix('skills')->group(function () {
        Route::get('/', 'index');
    });

    Route::controller(App\Http\Controllers\Api\StatusController::class)->prefix('statuses')->group(function () {
        Route::get('/', 'index');
    });

    Route::controller(App\Http\Controllers\Api\TagController::class)->prefix('tags')->group(function () {
        Route::get('/', 'index');
    });

    Route::controller(App\Http\Controllers\Api\UserController::class)->prefix('users')->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('/{id}', 'show');
        Route::post('/{id}', 'update');
        Route::delete('/{id}', 'destroy');
    });
});
