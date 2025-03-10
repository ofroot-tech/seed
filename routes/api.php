<?php 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\ChatbotController;

Route::middleware([
    EnsureFrontendRequestsAreStateful::class,
])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum');
});
