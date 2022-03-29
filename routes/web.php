<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ReservationController;


Route::get('/', [ShopController::class, 'index'])->name('index.shop');
Route::post('/', [ShopController::class, 'search']);
Route::get('/detail/{shop_id?}', [ShopController::class, 'detail'])->name('detail.shop');

Route::get('/mypage', [UserController::class, 'mypage'])->name('mypage');
Route::post('/mypage/delete', [UserController::class, 'delete'])->name('mypage.delete');
Route::post('/like', [LikeController::class, 'create'])->name('like');
Route::post('/like/delete', [LikeController::class, 'delete'])->name('unlike');
Route::post('/reserve', [ReservationController::class, 'create'])->name('create.reservation');
Route::get('/reserve', [ReservationController::class, 'index']);
Route::get('/detail/{shop_id}', [ReservationController::class, 'back']);

//Route::post('/reserve/delete', [ReservationController::class, 'delete'])->name('delete.reservation');


//Route::get('/', function () {
    //return view('welcome');
//});

 Route::get('/dashboard', function () {
     return view('dashboard');
 })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
