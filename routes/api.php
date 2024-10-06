<?php


use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\BlogController;
// use App\Http\Controllers\BlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// GET /api/posts: Retrieve all blog posts.
// •GET /api/posts/{id}: Retrieve a single blog post by ID.
// •POST /api/posts: Create a new blog post.
// •PUT /api/posts/{id}: Update an existing blog post by ID.
// •DELETE /api/posts/{id}: Delete a blog post by ID.

Route::middleware('auth:sanctum')->group(function(){    
    Route::get('/posts',[BlogController::class,"get_all"]);
    Route::get('/posts/{id}',[BlogController::class,"get_by_id"]);
    Route::post('/posts',[BlogController::class,"create"]);
    Route::put('/posts/{id}',[BlogController::class,"update"]);
    Route::delete('/posts/{id}',[BlogController::class,"delete"]);
    Route::get('/user/logout',[BlogController::class,"logout"]);


});

Route::post('/user/register',[UserController::class,"register"]);
Route::post('/user/login',[UserController::class,"login"]);
