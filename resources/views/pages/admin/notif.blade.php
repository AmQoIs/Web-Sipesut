<x-guest-layout>
    <div class="flex flex-col items-center px-8 py-4">
        <h3 class="text-3xl font-bold">Notifikasi</h3>
        @if (count($notifs) == 0)
            <div class="flex flex-col gap-12 h-[80vh] justify-center items-center">
                <h1 class="text-5xl font-extrabold text-center">Tidak Ada Notifikasi</h1>
                <button onclick="history.back()" class="btn btn-primary btn-outline text-lg">Kembali</button>
            </div>
        @else
            <div class="w-full max-w-xl grid grid-cols-1 gap-4">
                @foreach ($notifs as $notif)
                    <form action="{{ route('update.notif', ['id' => $notif->id]) }}" method="post">
                        @csrf
                        <button class="card w-full bg-base-100 shadow-xl hover:bg-slate-100">
                            <div class="card-body w-full">
                                @if ($notif)
                                    <div class="flex flex-row justify-between items-center">
                                        <div class="flex flex-col gap-2">

                                            <p class="text-gray-500">
                                                {{ $notif->created_at->locale('id')->isoFormat('LLLL') }}
                                            </p>
                                            <h2 class="card-title">{{ $notif->pesan }}</h2>
                                        </div>
                                        @if (!$notif->status_dilihat)
                                            <div class="w-4 h-4 bg-error rounded-full"></div>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </button>
                    </form>
                @endforeach

                {{ $notifs->links() }}
            </div>
        @endif
    </div>
</x-guest-layout>
