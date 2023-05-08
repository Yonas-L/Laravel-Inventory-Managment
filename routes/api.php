<?php

use Illuminate\Http\Request;
use App\Http\Controllers\productController;
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
// Route::prefix('/products')->group(function () {
//     Route::get('all', [productController::class, 'index']);
//     Route::get('find/{id}', [productController::class, 'show']);
//     Route::post('store', [productController::class, 'store']);
//     Route::put('update/{id}', [productController::class, 'update']);
//     Route::delete('delete/{id}', [productController::class, 'destroy']);
// });
