<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;

class NotifController extends Controller
{
    protected $usersController;

    public function __construct(UsersController $usersController)
    {
        $this->usersController = $usersController;
    }

    public function getNotif()
    {
        $current = $this->usersController->getCurrentUser();

        if ($current) {
            $notifs = Notifikasi::with('history.surat')->where('penerima_id', $current->id)->orderBy('created_at', 'desc')->paginate(5);
            if ($current->role == 'ADMIN') {
                return view('pages.admin.notif', compact(['notifs']));
            } else {
                return view('pages.anggota.profil.notifikasi', compact(['notifs']));
            }
        }
    }

    public function updateNotif($id)
    {
        $current = $this->usersController->getCurrentUser();
        $notif = Notifikasi::with('history.surat')->findOrFail($id);

        if ($notif) {
            if ($notif->status_dilihat == false) {
                $notif->status_dilihat = true;
                $notif->save();
            }

            if ($current) {
                if ($current->role == 'ANGGOTA') {
                    return redirect('/surat/' . $notif->history->surat_id);
                }
            }
            return redirect('/admin/surat/' . $notif->history->surat_id);
        }
    }
}
