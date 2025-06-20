<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\SuratController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('pages.guest.home');
})->name('home');

Route::get('/403', function () {
    return view('errors.403');
})->name('403');




// Route Admin
require __DIR__ . '/admin.php';

// Route Anggota
require __DIR__ . '/anggota.php';

require __DIR__ . '/auth.php';
