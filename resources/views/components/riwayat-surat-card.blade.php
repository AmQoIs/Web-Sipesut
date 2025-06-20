<div class="bg-white rounded shadow h-min">
    <div class="bg-warning text-white p-4 rounded-t">
        <h2 class="text-xl font-semibold">Riwayat Surat</h2>
    </div>
    <div class="p-6 flex items-center justify-center">
        {{-- Riwayat Surat --}}
        <x-timeline :riwayats="$riwayats">

        </x-timeline>
    </div>
  </div>