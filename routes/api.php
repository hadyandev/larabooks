<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;

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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);
Route::get('/mea', [AuthController::class, 'me']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/author', [AuthorController::class, 'index']);
Route::get('/author/{author}', [AuthorController::class, 'show']);
Route::post('/author', [AuthorController::class, 'store']);
Route::put('/author/{author}', [AuthorController::class, 'update']);
Route::delete('/author/{author}', [AuthorController::class, 'destroy']);

Route::get('/publisher', [PublisherController::class, 'index']);
Route::get('/publisher/{publisher}', [PublisherController::class, 'show']);
Route::post('/publisher', [PublisherController::class, 'store']);
Route::put('/publisher/{publisher}', [PublisherController::class, 'update']);
Route::delete('/publisher/{publisher}', [PublisherController::class, 'destroy']);

// Route::group(['prefix' => 'author'], function () {
//     Route::apiResource('/{author}/books', 'BookController');
// });
