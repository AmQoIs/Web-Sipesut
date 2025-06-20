<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\NotifController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\UsersController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin');

    Route::get('/notifikasi', [NotifController::class, 'getNotif'])->name('admin.notif');

    Route::prefix('surat')->name('admin.surat.')->group(function () {
        // Semua Status Surat
        Route::get('/', [SuratController::class, 'index'])->name('index');
        // Surat Belum Dicek
        Route::get('/belum-dicek', [SuratController::class, 'belumDicek'])->name('belum_dicek');
        // Surat Revisi
        Route::get('/revisi', [SuratController::class, 'revisi'])->name('revisi');
        // Surat Diterima
        Route::get('/diterima', [SuratController::class, 'diterima'])->name('diterima');
        // Surat Ditolak
        Route::get('/ditolak', [SuratController::class, 'ditolak'])->name('ditolak');

        Route::get('/{id}', [SuratController::class, 'detail'])->name('detail');
        Route::post('/{id}/tolak', [SuratController::class, 'tolak'])->name('tolak');
        Route::post('/{id}/ubah', [SuratController::class, 'ubahStatusSurat'])->name('ubah_status');

        Route::post('/{id}/ubahIsi', [SuratController::class, 'updateSuratAdmin'])->name('edit-post');

        // admin lihat surat
        Route::get('/{id}/lihat', [SuratController::class, 'lihatSurat'])->name('lihat');

        // Route::get('/file/{filename}', [SuratController::class, 'show'])->name('file');


    });

    Route::prefix('users')->name('admin.users.')->group(function () {
        Route::get('/', [UsersController::class, 'index'])->name('users');
        Route::get('/create', function () {
            return view('pages.admin.users.create');
        })->name('users');
        Route::post('/create', [UsersController::class, 'createUser'])->name('create');
        Route::get('/{id}/edit', function ($id) {
            $user = User::findOrFail($id);
            return view('pages.admin.users.edit', ['user' => $user]);
        })->name('edit');
        Route::post('/{id}/edit', [UsersController::class, 'updateUser'])->name('edit-post');
        Route::post('/{id}/change-password', [UsersController::class, 'changePassword'])->name('change-password');
        Route::post('/{id}', [UsersController::class, 'deleteUser'])->name('delete');
    });

    Route::get('/notifications', [NotifikasiController::class, 'fetchNotifAdmin'])->name('notifications.admin.fetch');

    Route::post('/notifications/admin/update-status', [NotifikasiController::class, 'tandaiBacaNotifAdmin'])->name('notifications.admin.tandai_dibaca');
});
