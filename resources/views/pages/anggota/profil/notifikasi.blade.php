<x-guest-layout>
    <div class="flex flex-col items-center px-8 py-4 mt-32 mb-12">
        <h3 class="text-3xl font-bold">Notifikasi</h3>
        @if (count($notifs) == 0)
            <div class="flex flex-col gap-12 h-[80vh] justify-center items-center">
                <h1 class="text-5xl font-extrabold text-center">Tidak Ada Notifikasi</h1>
                <button onclick="history.back()" class="btn btn-primary btn-outline text-lg">Kembali</button>
            </div>
        @else
            <div class="w-full max-w-xl grid grid-cols-1 gap-4">
                @foreach ($notifs as $notif)
                    @if (!$notif->status_dilihat)
                        <form action="{{ route('update.notif', ['id' => $notif->id]) }}" method="post">
                            @csrf
                            <button class="card w-full bg-base-100 shadow-xl hover:bg-slate-100">
                                <div class="card-body w-full">
                                    @if ($notif)
                                        <a href="{{ route('anggota.surat.surat', ['id' => $notif->history->surat_id]) }}"
                                            class="flex justify-between items-center">
                                            <div class="flex flex-col items-start gap-2">

                                                <p class="text-gray-500">
                                                    {{ $notif->created_at->locale('id')->isoFormat('LLLL') }}
                                                </p>
                                                <h2 class="card-title text-start">{{ $notif->pesan }}</h2>
                                            </div>
                                            <div class="text-red-500 text-sm bg-red-100 px-2 p-1 rounded-3xl uppercase">
                                                Belum Dibaca
                                            </div>
                                        </a>
                                    @endif
                                </div>
                            </button>
                        </form>
                    @else
                        <button class="card w-full bg-base-100 shadow-xl hover:bg-slate-100">
                            <div class="card-body w-full">
                                @if ($notif)
                                    <a href="{{ route('anggota.surat.surat', ['id' => $notif->history->surat_id]) }}"
                                        class="flex flex-row justify-between items-center">
                                        <div class="flex flex-col items-start gap-2">

                                            <p class="text-gray-500">
                                                {{ $notif->created_at->locale('id')->isoFormat('LLLL') }}
                                            </p>
                                            <h2 class="card-title text-start">{{ $notif->pesan }}</h2>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </button>
                    @endif
                @endforeach

                {{ $notifs->links() }}
            </div>
        @endif
    </div>
</x-guest-layout>
