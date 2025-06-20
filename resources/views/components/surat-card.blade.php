@props([
    'judul' => 'Judul Surat',
    'perihal' => 'Perihal Surat',
    'tanggal' => 'Rabu, 22 Mei 2024',
    'status' => 'diterima',
])

<a href="/surat/1" class="card w-full bg-base-100 shadow-xl hover:bg-slate-100">
    <div class="card-body">
        <p class="text-gray-500">{{ $tanggal }}</p>
        <h2 class="card-title">{{ $judul }}</h2>
        <p>{{ $perihal }}</p>
        <div class="card-actions justify-end">
            <p class="flex items-center justify-end gap-2 px-4 text-green-700"><span
                    class="inline-block bg-green-700 rounded-3xl w-3 h-3"></span> {{ $status }}</p>
        </div>
    </div>
</a>
