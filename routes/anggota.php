<?php

use App\Http\Controllers\NotifController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\UsersController;
use App\Models\Surat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/about', function () {
        return view('welcome');
    })->name('welcome');

    Route::middleware('admin')->group(function () {
        Route::get('/profile', function () {
            $user = Auth::user();
            return view('pages.anggota.profil.profile', ['user' => $user]);
        })->name('profil');

        Route::post('/profile/{id}', [UsersController::class, 'updateUser'])->name('anggota.users.update');
        Route::post('/change-password/{id}', [UsersController::class, 'changePassword'])->name('anggota.users.change-password');
    });


    Route::prefix('surat')->name('anggota.surat.')->group(function () {
        Route::get('/', [SuratController::class, 'index_anggota'])->name('cari');
        Route::get('/upload', function () {
            return view('pages.anggota.surat.upload');
        })->name('upload');
        Route::post('/upload', [SuratController::class, 'store'])->name('upload.post');
        Route::get('/{id}', [SuratController::class, 'detail'])->name('surat');
        Route::get('/{id}/revisi', function ($id) {
            $surat = Surat::findOrFail($id);
            return view('pages.anggota.surat.update', ['surat' => $surat]);
        })->name('edit');
        Route::post('/{id}/revisi', [SuratController::class, 'updateSurat'])->name('edit-post');
        Route::get('/file/{filename}', [SuratController::class, 'show'])->name('file');
        Route::get('/{id}/lihat', [SuratController::class, 'lihatSurat'])->name('lihat');
    });


    Route::get('/notifikasi', [NotifController::class, 'getNotif'])->name('notif');
    Route::post('/notifikasi/{id}', [NotifController::class, 'updateNotif'])->name('update.notif');
    // Route::get('/admin/users', [UsersController::class, 'index'])->name('pages.admin.users.users');
});
