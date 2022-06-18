<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Illuminate\Http\Client\Request as ClientRequest;
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


Route::middleware('auth:api')->prefix('v1')->group(function(){
    Route::get('/user',function(Request $request){
        return $request->user();
    });

    // Route::apiResource('/authors',AuthorController::class);
    Route::get('/authors',[AuthorController::class,'index']);
    Route::get('/authors/{author}',[AuthorController::class,'show']);
    Route::post('/authors',[AuthorController::class,'store']);
    Route::put('/authors/{author}',[AuthorController::class,'update']);
    Route::delete('/authors/{author}',[AuthorController::class,'destroy']);
    Route::get('/authors/search/{name}',[AuthorController::class,'search']);
    

    // Route::apiResource('/books',BookController::class);
    Route::get('/books',[BookController::class,'index']);
    Route::get('/books/{book}',[BookController::class,'show']);
    Route::post('/books',[BookController::class,'store']);
    Route::put('/books/{book}',[BookController::class,'update']);
    Route::delete('/books/{book}',[BookController::class,'destroy']);
    Route::get('/books/search/{name}',[BookController::class,'search']);
});