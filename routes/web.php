<?php

use Illuminate\Support\Facades\Route;
use AshAllenDesign\ShortURL\Facades\ShortURL;

/*AshAllenDesign\ShortURL\Facades
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

Auth::routes();
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/short-url', [App\Http\Controllers\ShortURLController::class, 'index'])->name('short-url');
    Route::get('/no-of-visit/{id}', [App\Http\Controllers\ShortURLController::class, 'view'])->name('no-of-visit');

