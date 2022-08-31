<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;

use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('home');
})->name('movie.home');


Route::get('/category', [CategoryController::class , 'index'])->name('category.index');
Route::get('/category/create' , [CategoryController::class , 'create'])->name('category.create');
Route::post('/category/add' , [CategoryController::class , 'store'])->name('category.store');
Route::get('/category/edit/{slug}' , [CategoryController::class , 'edit'])->name('category.edit');
Route::put('/category/update/{slug}' , [CategoryController::class , 'update'])->name('category.update');
Route::delete('/category/delete/{slug}' , [CategoryController::class , 'destroy'])->name('category.destroy');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::resource('post' , PostController::class);

Route::get('user/' , [HomeController::class, 'index'])->name('user.index');
Route::put('user/update/{id}' , [HomeController::class, 'update'])->name('user.update');
// Route::get('/dashboard' , function () {
//     return view('dashboard');
// })->name('dashboard');
