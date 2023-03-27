<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

/**
 * @OA\Get(
 *     path="/products",
 *     summary="Get a list of products",
 *     operationId="getProductsList",
 *     tags={"Products"},
 *     @OA\Response(
 *         response=200,
 *         description="A list with products",
 *         @OA\JsonContent(ref="#/components/schemas/Product")
 *     ),
 *     @OA\Response(
 *         response="default",
 *         description="An error occurred",
 *         @OA\JsonContent(ref="#/components/schemas/Error")
 *     )
 * )
 */

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);


Route::middleware('auth:api')->group(function () {
    Route::get('products', [ProductController::class, 'index']);
    Route::get('products/{id}', [ProductController::class, 'show']);
    Route::post('products', [ProductController::class, 'create']);
    Route::put('products/{id}', [ProductController::class, 'edit']);
});


