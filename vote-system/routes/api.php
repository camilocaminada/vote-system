<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\VoterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/voters', [VoterController::class, 'store'])->middleware('auth:sanctum');

Route::prefix('votes')->group(function () {
    Route::post('', [VoteController::class, 'store']);
    Route::get('', [VoteController::class, 'list'])->middleware('auth:sanctum');
    Route::get('{id}', [VoteController::class, 'get'])->middleware('auth:sanctum');
});

Route::prefix('candidates')->group(function () {
    Route::get('', [VoterController::class, 'getCandidates']);
    Route::get('votes', [VoterController::class, 'getCandidatesWithVotes'])->middleware('auth:sanctum');
});

Route::prefix('admin')->group(function () {
    Route::post('', [AdminController::class, 'store'])->middleware('auth:sanctum');
    Route::post('login', [AdminController::class, 'login']);
    Route::post('update-password', [AdminController::class, 'updatePassword'])
        ->middleware('auth:sanctum');
});

