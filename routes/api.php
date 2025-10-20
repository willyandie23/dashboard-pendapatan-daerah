<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\AppLogController;
use App\Http\Controllers\API\DocumentController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api');

Route::resource('app-logs', AppLogController::class, ['only' => ['index', 'show']]);

Route::resource('dokumen', DocumentController::class, ['only' => ['index', 'incrementDownload', 'download']]);

Route::middleware('auth:api')->group(function () {
    Route::resource('dokumen', DocumentController::class, ['only' => ['store', 'show', 'update', 'destroy']]);
});