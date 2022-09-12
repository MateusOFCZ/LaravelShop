<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProductController;

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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::middleware('auth:sanctum')->prefix('company')->group(function() {
    Route::get('/', [CompanyController::class, 'index'])->name('company.index');
    Route::post('/', [CompanyController::class, 'store'])->name('company.store');
    Route::get('/{id}', [CompanyController::class, 'show'])->name('company.show');
    Route::post('/{id}', [CompanyController::class, 'update'])->name('company.update');
    Route::delete('/{id}', [CompanyController::class, 'destroy'])->name('company.destroy');
});

Route::middleware('auth:sanctum')->prefix('companyproduct')->group(function() {
    Route::get('/', [CompanyProductController::class, 'index'])->name('companyproduct.index');
    Route::post('/', [CompanyProductController::class, 'store'])->name('companyproduct.store');
    Route::get('/{id}', [CompanyProductController::class, 'show'])->name('companyproduct.show');
    Route::post('/{id}', [CompanyProductController::class, 'update'])->name('companyproduct.update');
    Route::delete('/{id}', [CompanyProductController::class, 'destroy'])->name('companyproduct.destroy');
});

Route::middleware('auth:sanctum')->prefix('product')->group(function() {
    Route::get('/', [ProductController::class, 'index'])->name('product.index');
    Route::post('/', [ProductController::class, 'store'])->name('product.store');
    Route::get('/{id}', [ProductController::class, 'show'])->name('product.show');
    Route::post('/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
});

Route::middleware('auth:sanctum')->prefix('user')->group(function() {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::post('/', [UserController::class, 'store'])->name('user.store');
    Route::get('/{id}', [UserController::class, 'show'])->name('user.show');
    Route::post('/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});

Route::middleware('auth:sanctum')->prefix('userproduct')->group(function() {
    Route::get('/', [UserProductController::class, 'index'])->name('userproduct.index');
    Route::post('/', [UserProductController::class, 'store'])->name('userproduct.store');
    Route::get('/{id}', [UserProductController::class, 'show'])->name('userproduct.show');
    Route::post('/{id}', [UserProductController::class, 'update'])->name('userproduct.update');
    Route::delete('/{id}', [UserProductController::class, 'destroy'])->name('userproduct.destroy');
});