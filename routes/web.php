<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\CustomerController;

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

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/dashboard', function () {
        return view('customer.home');
    })->name('dashboard');

    // Route GROUP, with MIDDLEWARE
    Route::group(
        ['prefix' => 'customer', 'middleware' => 'test_middleware'],
        function () {
            Route::get('/home', [CustomerController::class, 'home']);
        }
    );
});
