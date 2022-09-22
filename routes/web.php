<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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
    return view('admin.register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

/*.........................Admin Route......................*/
Route::prefix('admin')->group(function(){
Route::get('/login',[AdminController::class, 'Login'])->name('login');
Route::post('/login',[AdminController::class, 'LoginSubmit'])->name('login');
Route::get('/dashboard',[AdminController::class, 'Dashboard'])->name('dashboard')->middleware('admin');
Route::get('/logout',[AdminController::class, 'Logout'])->name('logout')->middleware('admin');
Route::get('/register',[AdminController::class, 'Register'])->name('register');
Route::post('/register',[AdminController::class, 'RegisterSubmit'])->name('register');
});