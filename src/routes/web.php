<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use Laravel\Fortify\Fortify;

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

Route::get('/register', [ItemController::class, 'showRegisterForm']);
Route::post('/register', [ItemController::class, 'register']);
Route::post('/login', [ItemController::class, 'login']);
Route::get('/login', [ItemController::class, 'login']);
Route::get('/mypage/profile', [ItemController::class, 'showProfileForm']);
Route::post('/login', [ItemController::class, 'doLogin']);
Route::post('/logout', function (Illuminate\Http\Request $request) {
    auth()->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');
Route::post('/', [ItemController::class, 'index']);
Fortify::loginView(fn () => view('login'));
Fortify::registerView(fn () => view('register'));
Route::get('/', [ItemController::class, 'index'])->name('home');



