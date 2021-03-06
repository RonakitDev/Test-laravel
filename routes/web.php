<?php

use App\Http\Controllers\BitlyController;
use Illuminate\Support\Facades\Auth;
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
//Route::get('/404', function () {
//    return view('wait');
//});
Route::group(['middleware' => ['auth']], function () {
    // Profiles
    Route::get('/', [BitlyController::class, 'index']);
    Route::resource('dashboard', BitlyController::class);
    Route::get('status', [BitlyController::class, 'update_status']);
    Route::get('{code}', [BitlyController::class, 'shortenLink'])->name('shorten.link');
});
