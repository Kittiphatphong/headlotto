<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellController;
use App\Http\Controllers\SellerController;
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
Route::middleware(['auth'])->group(function(){


Route::get('/dashboard', function () {
    return view('dashboard')
        ->with('dashboard','dashboard')
        ->with('sellers',\App\Models\Seller::all());
})->name('dashboard');

Route::resource('seller',SellerController::class);

Route::resource('sell',SellController::class);

});
require __DIR__.'/auth.php';
