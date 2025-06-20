<?php

namespace App\Http\Controllers;

use App\Constants\Aktivitas;
use App\Constants\DetailAktivitas;
use App\Constants\Status;
use App\Constants\TipeSurat;
use App\Models\History;
use App\Models\Notifikasi;
use App\Models\Surat;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\Datatables;
use Illuminate\Support\Facades\Response;

class SuratController extends Controller
{
    protected $usersController;

    public function __construct(UsersController $usersController)
    {
        $this->usersController = $usersController;
    }

    protected function getDataTableResponse(Request $request, $query, $view)
    {
        if ($request->ajax()) {

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<div class="flex justify-center"><a href="' . route('admin.surat.detail', ['id' => $row->id]) . '" class="detail-btn rounded text-white bg-[#5383e9] px-4 py-2">Detail</a></div>';
                    return $actionBtn;
                })
                ->addColumn('tipe_surat', function ($row) {
                    if ($row->tipe_surat == 'SURAT_BIASA') {
                        return "<span class='px-2 bg-opacity-10 bg-warning rounded-lg text-center text-warning'>Surat Biasa</span>";
                    } elseif ($row->tipe_surat == 'NOTA_DINAS') {
                        return "<span class='px-2 bg-opacity-10 bg-neutral rounded-lg text-center text-primary'>Nota Dinas</span>";
                    } elseif ($row->tipe_surat == 'SURAT_EDARAN') {
                        return "<span class='px-2 bg-opacity-10 bg-success rounded-lg text-center text-success'>Surat Edaran</span>";
                    } else {
                        return "<span class='px-2 bg-opacity-10 bg-error rounded-lg text-center text-danger'>Surat Perintah</span>";
                    }
                })
                ->addColumn('status', function ($row) {
                    if ($row->status == 'BELUM_DICEK') {
                        return "<span class='px-2 bg-opacity-10 bg-warning rounded-lg text-center text-warning'>Belum Dicek</span>";
                    } elseif ($row->status == 'REVISI') {
                        return "<span class='px-2 bg-opacity-10 bg-secondary rounded-lg text-center text-secondary'>Revisi</span>";
                    } elseif ($row->status == 'DITERIMA') {
                        return "<span class='px-2 bg-opacity-10 bg-success rounded-lg text-center text-success'>Diterima</span>";
                    } else {
                        return "<span class='px-2 bg-opacity-10 bg-danger rounded-lg text-center text-danger'>Ditolak</span>";
                    }
                })
                ->rawColumns(['action', 'status', 'tipe_surat'])
                ->make(true);
        }

        return view($view);
    }

    public function index(Request $request)
    {
        return $this->getDataTableResponse($request, Surat::query(), 'pages.admin.surat.index');
    }

    public function belumDicek(Request $request)
    {
        return $this->getDataTableResponse($request, Surat::where('status', Status::BELUM_DICEK), 'pages.admin.surat.belum-dicek');
    }

    public function revisi(Request $request)
    {
        return $this->getDataTableResponse($request, Surat::where('status', Status::REVISI), 'pages.admin.surat.revisi');
    }

    public function diterima(Request $request)
    {
        return $this->getDataTableResponse($request, Surat::where('status', Status::DITERIMA), 'pages.admin.surat.diterima');
    }

    public function ditolak(Request $request)
    {
        return $this->getDataTableResponse($request, Surat::where('status', Status::DITOLAK), 'pages.admin.surat.ditolak');
    }



    public function index_anggota(Request $request)
    {
        if ($request->ajax()) {
            $current = $this->usersController->getCurrentUser();
            $query = Surat::where('user_id', $current->id);

            if ($request->has('status') && $request->status != '') {
                $query->where('status', $request->status);
            }

            $data = $query->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<div class="flex justify-center"><a href="' . route('anggota.surat.surat', ['id' => $row->id]) . '" class="detail-btn rounded text-white bg-[#5383e9] px-4 py-2">Detail</a></div>';
                    return $actionBtn;
                })
                ->addColumn('tipe_surat', function ($row) {
                    if ($row->tipe_surat == 'SURAT_BIASA') {
                        return "<span class='px-2 bg-opacity-10 bg-warning rounded-lg text-center text-warning'>Surat Biasa</span>";
                    } elseif ($row->tipe_surat == 'NOTA_DINAS') {
                        return "<span class='px-2 bg-opacity-10 bg-neutral rounded-lg text-center text-primary'>Nota Dinas</span>";
                    } elseif ($row->tipe_surat == 'SURAT_EDARAN') {
                        return "<span class='px-2 bg-opacity-10 bg-success rounded-lg text-center text-success'>Surat Edaran</span>";
                    } else {
                        return "<span class='px-2 bg-opacity-10 bg-error rounded-lg text-center text-danger'>Surat Perintah</span>";
                    }
                })
                ->addColumn('status', function ($row) {
                    if ($row->status == 'BELUM_DICEK') {
                        return "<span class='px-2 bg-opacity-10 bg-warning rounded-lg text-center text-warning'>Belum Dicek</span>";
                    } elseif ($row->status == 'REVISI') {
                        return "<span class='px-2 bg-opacity-10 bg-secondary rounded-lg text-center text-secondary'>Revisi</span>";
                    } elseif ($row->status == 'DITERIMA') {
                        return "<span class='px-2 bg-opacity-10 bg-success rounded-lg text-center text-success'>Diterima</span>";
                    } else {
                        return "<span class='px-2 bg-opacity-10 bg-error rounded-lg text-center text-error'>Ditolak</span>";
                    }
                })
                ->rawColumns(['action', 'status', 'tipe_surat'])
                ->make(true);
        }

        return view('pages.anggota.surat.cari');
    }

    public function updateSurat(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|max:255|string',
            'nomor' => 'required|max:255|string',
            'kepada' => 'required|max:255|string',
            'perihal' => 'required|max:255|string',
            'dari' => 'required|max:255|string',
        ]);

        if ($request->tipe == 1) {
            $tipe = TipeSurat::SURAT_BIASA;
        } elseif ($request->tipe == 2) {
            $tipe = TipeSurat::NOTA_DINAS;
        } elseif ($request->tipe == 3) {
            $tipe = TipeSurat::SURAT_PERINTAH;
        } else {
            $tipe = TipeSurat::SURAT_EDARAN;
        }

        $surat = Surat::findOrfail($id);

        if ($surat) {
            if ($request->file) {
                Storage::delete($surat->nama_file);
                $path = $request->file('file')->store('/public');
                $surat->nama_file = $path;
            }
            $admins = $this->usersController->getAdmin();

            $surat->judul = $request->judul;
            $surat->no_surat = $request->nomor;
            $surat->kepada = $request->kepada;
            $surat->perihal = $request->perihal;
            $surat->dari = $request->dari;
            $surat->status = Status::REVISI;
            $surat->tipe_surat = $tipe;
            $surat->apakah_sudah_revisi = 1;
            $surat->save();

            $history = History::create([
                'user_id' => $surat->user_id,
                'surat_id' => $surat->id,
                'aktivitas' => Aktivitas::REVISI,
                // 'komentar' => 'Surat ' . $surat->judul . ' untuk ' . $surat->kepada . ' dibuat.',
                'detail_aktivitas' => DetailAktivitas::REVISI
            ]);

            if ($admins) {
                foreach ($admins as $admin) {
                    Notifikasi::create([
                        'penerima_id' => $admin->id,
                        'status_dilihat' => false,
                        'pesan' => 'Surat ' . $surat->judul . ' dengan nomor ' . $surat->no_surat . ' telah direvisi oleh ' . auth()->user()->nama,
                        'history_id' => $history->id,
                    ]);
                }
            }

            return response()->json(['success' => true, 'message' => 'Surat berhasil direvisi', 'id' => $id]);
        }
        return response()->json(['success' => false, 'message' => 'Gagal merevisi surat']);
    }

    public function updateSuratAdmin(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|max:255|string',
            'nomor' => 'required|max:255|string',
            'kepada' => 'required|max:255|string',
            'perihal' => 'required|max:255|string',
            'dari' => 'required|max:255|string',
        ]);

        if ($request->tipe == 1) {
            $tipe = TipeSurat::SURAT_BIASA;
        } elseif ($request->tipe == 2) {
            $tipe = TipeSurat::NOTA_DINAS;
        } elseif ($request->tipe == 3) {
            $tipe = TipeSurat::SURAT_PERINTAH;
        } else {
            $tipe = TipeSurat::SURAT_EDARAN;
        }

        $surat = Surat::where(['status' => Status::DITERIMA])->findOrfail($id);

        if ($surat) {
            if ($request->file) {
                Storage::delete($surat->nama_file);
                $path = $request->file('file')->store('/public');
                $surat->nama_file = $path;
            }

            $surat->judul = $request->judul;
            $surat->no_surat = $request->nomor;
            $surat->kepada = $request->kepada;
            $surat->perihal = $request->perihal;
            $surat->dari = $request->dari;
            $surat->tipe_surat = $tipe;
            $surat->save();

            return response()->json(['success' => true, 'message' => 'Surat berhasil dibah', 'id' => $id]);
        }
        return response()->json(['success' => false, 'message' => 'Gagal mengubah surat']);
    }

    public function detail($id)
    {
        $surat = Surat::with('user')->findOrFail($id);

        $user = $this->usersController->getCurrentUser();
        // var_dump([$surat->toArray()]);
        if ($user->role == 'ADMIN') {
            $riwayats = $surat->historys()->get();
            // var_dump($riwayats);
            return view('pages.admin.surat.detail', compact(['surat', 'riwayats']));
        } else {
            $riwayats = $surat->historys()->orderBy('created_at', 'asc')->get();
            return view('pages.anggota.surat.surat', compact(['surat', 'riwayats']));
        }
    }

    public function tolak(Request $request, $id)
    {
        $request->validate([
            'komentar' => 'required',
        ]);

        $surat = Surat::findOrFail($id);
        if ($surat) {
            $surat->status = Status::DITOLAK;
            $surat->save();

            $history = History::create([
                'user_id' => auth()->id(),
                'surat_id' => $id,
                'aktivitas' => Aktivitas::TOLAK,
                'komentar' => $request->komentar,
                'detail_aktivitas' => DetailAktivitas::TOLAK
            ]);

            Notifikasi::create([
                'penerima_id' => $surat->user_id,
                'status_dilihat' => false,
                'pesan' => 'Surat ' . $surat->judul . ' dengan nomor ' . $surat->no_surat . ' telah ditolak oleh ' . auth()->user()->email,
                'history_id' => $history->id,
            ]);

            return response()->json(['success' => true, 'message' => 'Status surat berhasil diubah menjadi ditolak']);
        }

        return response()->json(['success' => true, 'message' => 'Gagal mengubah status menjadi ditolak.']);
    }

    public function ubahStatusSurat(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
            'komentar' => 'nullable|string',
        ]);

        $surat = Surat::findOrFail($id);
        if ($surat) {
            $surat->status = $request->status === 'terima' ? Status::DITERIMA : Status::REVISI;
            $surat->apakah_sudah_revisi = $request->status === 'revisi' ? 0 : $surat->apakah_sudah_revisi;

            if ($surat->status == Status::DITERIMA) {
                $surat->accepted_at = now();
            }

            $surat->save();

            $aktivitas = $request->status === 'revisi' ? Aktivitas::REVISI : Aktivitas::TERIMA;
            $detail_aktivitas = $request->status === 'revisi' ? DetailAktivitas::MINTA_REVISI : DetailAktivitas::TERIMA;


            $history = History::create([
                'user_id' => auth()->id(),
                'surat_id' => $id,
                'aktivitas' => $aktivitas,
                'komentar' => $request->komentar,
                'detail_aktivitas' => $detail_aktivitas
            ]);

            $pesan = $request->status === 'revisi' ? "Surat " . $surat->no_surat . " telah diminta untuk revisi oleh " . auth()->user()->nama : "Surat " . $surat->nomor . " telah diterima";

            Notifikasi::create([
                'penerima_id' => $surat->user_id,
                'status_dilihat' => false,
                'pesan' => $pesan,
                'history_id' => $history->id,
            ]);

            return response()->json(['success' => true, 'message' => 'Status surat berhasil diubah']);
        }

        return response()->json(['success' => false, 'message' => 'Gagal mengubah status surat.'], 400);
    }

    public function show($filename, $id)
    {
        $filePath = Storage::path('app/' . $filename);

        if (file_exists($filePath)) {
            if (auth()->user()->role === "ADMIN") {
                $surat = Surat::findOrFail($id);
                if ($surat->status !== Status::DITERIMA || $surat->status !== Status::DITOLAK) {

                    // Cek apakah sudah pernah didownload sebelumnya
                    $isDilihat = History::where('user_id', auth()->id())
                        ->where('surat_id', $id)
                        ->where('aktivitas', Aktivitas::LIHAT)
                        ->exists();

                    if (!$isDilihat) {
                        History::create([
                            'user_id' => auth()->id(),
                            'surat_id' => $id,
                            'aktivitas' => Aktivitas::LIHAT,
                            'detail_aktivitas' => DetailAktivitas::LIHAT
                        ]);
                    }
                }
            }
            return response()->file($filePath);
        } else {
            abort(404);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255|string',
            'nomor' => 'required|max:255|string',
            'kepada' => 'required|max:255|string',
            'perihal' => 'required|max:255|string',
            'dari' => 'required|max:255|string',
            'file' => 'required'
        ]);

        $path = $request->file('file')->store('/public');

        $user = $this->usersController->getCurrentUser();
        $admins = $this->usersController->getAdmin();

        if ($request->tipe == 1) {
            $tipe = TipeSurat::SURAT_BIASA;
        } elseif ($request->tipe == 2) {
            $tipe = TipeSurat::NOTA_DINAS;
        } elseif ($request->tipe == 3) {
            $tipe = TipeSurat::SURAT_PERINTAH;
        } else {
            $tipe = TipeSurat::SURAT_EDARAN;
        }

        $surat = Surat::create([
            'judul' => $request->judul,
            'no_surat' => $request->nomor,
            'tipe_surat' => $tipe,
            'dari' => $request->dari,
            'perihal' => $request->perihal,
            'kepada' => $request->kepada,
            'status' => Status::BELUM_DICEK,
            'nama_file' => $path,
            'user_id' => $user->id
        ]);

        $history = History::create([
            'user_id' => $surat->user_id,
            'surat_id' => $surat->id,
            'aktivitas' => Aktivitas::UPLOAD,
            'komentar' => 'Surat ' . $surat->judul . ' untuk ' . $surat->kepada . ' dibuat.',
            'detail_aktivitas' => DetailAktivitas::UPLOAD
        ]);

        if ($admins) {
            foreach ($admins as $admin) {
                Notifikasi::create([
                    'penerima_id' => $admin->id,
                    'status_dilihat' => false,
                    'pesan' => 'Surat ' . $surat->judul . ' dengan nomor ' . $surat->no_surat . ' telah dibuat oleh ' . $user->nama,
                    'history_id' => $history->id,
                ]);
            }
        }

        return response()->json(['success' => true, 'message' => 'Surat berhasil dikirim']);
    }

    public function lihatSurat($id, Request $request)
    {
        $surat = Surat::findOrFail($id);
        if ($surat->status !== Status::DITERIMA || $surat->status !== Status::DITOLAK) {

            // Cek apakah sudah pernah didownload sebelumnya
            $isDilihat = History::where('user_id', auth()->id())
                ->where('surat_id', $id)
                ->where('aktivitas', Aktivitas::LIHAT)
                ->exists();

            if (!$isDilihat) {
                $history = History::create([
                    'user_id' => auth()->id(),
                    'surat_id' => $id,
                    'aktivitas' => Aktivitas::LIHAT,
                    'detail_aktivitas' => DetailAktivitas::LIHAT
                ]);

                Notifikasi::create([
                    'penerima_id' => $surat->user_id,
                    'status_dilihat' => false,
                    'pesan' => 'Surat ' . $surat->judul . ' dengan nomor ' . $surat->no_surat . ' telah dilihat dan sedang diproses ',
                    'history_id' => $history->id,
                ]);
            }
        }

        $surat_name = explode('/', $surat->nama_file);
        $file_path = Storage::path('' . $surat->nama_file);
        $file_name = $surat->no_surat . '_' . $surat_name[1];


        return Response::download($file_path, $file_name);
    }
}
