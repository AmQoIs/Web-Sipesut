<?php

namespace App\Http\Controllers;

use App\Constants\Status;
use App\Models\Surat;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $statusCounts = Surat::selectRaw('status, count(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status');

        $countAllSurat = $statusCounts->sum();
        $countUploadStatus = $statusCounts->get(Status::BELUM_DICEK) ?? 0;
        $countRevisiStatus = $statusCounts->get(Status::REVISI) ?? 0;
        $countDiterimaStatus = $statusCounts->get(Status::DITERIMA) ?? 0;

        // var_dump($countAllSurat);

        return view(
            'pages.admin.dashboard',
            compact(
                'countAllSurat',
                'countUploadStatus',
                'countRevisiStatus',
                'countDiterimaStatus'
            )
        );
    }
}
