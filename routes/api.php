<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AutobotController;





Route::middleware(['throttle:5,1'])->group(function () {
    Route::get('/autobots', [AutobotController::class, 'index']);
    Route::get('/autobots/{id}/posts', [AutobotController::class, 'showPosts']);
    Route::get('/posts/{postId}/comments', [AutobotController::class, 'showComments']);
});

// Route::get('users', [UserController::class, 'index'])->middleware('auth:sanctum');

