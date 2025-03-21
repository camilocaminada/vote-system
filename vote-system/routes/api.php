<?php

use App\Http\Controllers\VoteController;
use App\Http\Controllers\VoterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/voters', [VoterController::class, 'store']);

Route::prefix('votes')->group(function () {
    Route::post('', [VoteController::class, 'store']);
    Route::get('', [VoteController::class, 'list']);
    Route::get('{id}', [VoteController::class, 'get']);
});

Route::prefix('candidates')->group(function () {
    Route::get('', [VoterController::class, 'getCandidates']);
    Route::get('votes', [VoterController::class, 'getCandidatesWithVotes']);
});
