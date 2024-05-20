<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/todos', TodoController::class);
Route::get('/', [TodoController::class, 'index']); /* 一覧表示 */
Route::post('/todos', [TodoController::class, 'store']); /* Todoの追加 */
Route::patch('/todos/update', [TodoController::class, 'update']); /* Todoの更新 */
Route::delete('/todos/delete', [TodoController::class, 'destroy']); /* Todoの削除 */
