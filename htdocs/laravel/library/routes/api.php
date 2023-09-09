<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\AuthorController;


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
Route::post('/livro', [LivroController::class, 'store']);
Route::get('/livros', [LivroController::class, 'index']);
Route::get('/livro', [LivroController::class, 'show']);
Route::put('/livro', [LivroController::class, 'update']);
Route::delete('/livro', [LivroController::class, 'destroy']);
Route::post('/autor', [AuthorController::class, 'store']);
Route::get('/autores', [AuthorController::class, 'index']);
Route::get('/autor', [AuthorController::class, 'show']);
Route::put('/autor', [AuthorController::class, 'update']);
Route::delete('/autor', [AuthorController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
