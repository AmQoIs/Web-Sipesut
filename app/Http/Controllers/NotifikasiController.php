<?php

namespace App\Http\Controllers;

use App\Constants\Aktivitas;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotifikasiController extends Controller
{
    public function fetchNotifAdmin(Request $request)
    {
        $notifications = DB::table('notifikasi')
            ->join('history', 'notifikasi.history_id', '=', 'history.id')
            ->where('notifikasi.penerima_id', auth()->id())
            ->where(function ($query) {
                $query->where('history.aktivitas', Aktivitas::UPLOAD)
                    ->orWhere('history.aktivitas', Aktivitas::REVISI);
            })
            ->orderBy('notifikasi.created_at', 'desc')
            ->select('notifikasi.*', 'history.*')
            ->get();

        return response()->json(json_encode($notifications));
    }

    public function tandaiBacaNotifAdmin(Request $request)
    {
        $updated = DB::table('notifikasi')
            ->join('history', 'notifikasi.history_id', '=', 'history.id')
            ->where('notifikasi.penerima_id', auth()->id())
            ->where(function ($query) {
                $query->where('history.aktivitas', Aktivitas::UPLOAD)
                    ->orWhere('history.aktivitas', Aktivitas::REVISI);
            })
            ->update(['notifikasi.status_dilihat' => 1]);

        if ($updated > 0) {
            return response()->json(['message' => 'Berhasil menandai telah dibaca', 'success' => true]);
        }
        return response()->json(['message' => 'Semua notifikasi telah ditandai', 'success' => false]);
    }
}
