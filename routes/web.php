<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
Route::get('/faq/new', [\App\Http\Controllers\FaqController::class, 'create'])
    ->middleware('can:manage-faq');
Route::post('/faq/new', [\App\Http\Controllers\FaqController::class, 'store'])
    ->middleware('can:manage-faq');
Route::get('/faq/{faq}', [\App\Http\Controllers\FaqController::class, 'edit'])
    ->middleware('can:manage-faq');
Route::put('/faq/{faq}', [\App\Http\Controllers\FaqController::class, 'put'])
    ->middleware('can:manage-faq');
Route::delete('/faq/{faq}', [\App\Http\Controllers\FaqController::class, 'delete'])
    ->middleware('can:manage-faq');

Route::get('/faq', [\App\Http\Controllers\FaqController::class, 'index']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
